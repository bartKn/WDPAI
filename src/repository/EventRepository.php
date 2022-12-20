<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Event.php';

class EventRepository extends Repository
{
    public function getEventWithId(int $id): Event
    {
        $stmt = $this->database->connect()->prepare('SELECT events.id, events.event_name, events.date, events.location, et.type_name AS type, events.distance, 
			events.total_participants, events.signed_participants, t."name"
		FROM events
			JOIN teams AS t
				ON t.id = events.team_id
			JOIN event_types AS et
				ON et."id" = events.type_id
		WHERE events.id = :id;');
        $stmt->bindValue(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return new Event(
            $result['id'],
            $result['event_name'],
            $result['date'],
            $result['location'],
            $result['type'],
            $result['distance'],
            $result['total_participants'],
            $result['signed_participants'],
            $result['name']
        );
    }


    public function saveEvent(Event $event): bool
    {
        $stmt = $this->database->connect()->prepare('SELECT id FROM event_types WHERE type_name = :type;');
        $stmt->bindValue(':type', $event->getType());

        $stmt->execute();
        $type_id = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt = $this->database->connect()->prepare('INSERT INTO events(team_id, event_name, date, location, type_id,
                   distance, total_participants, track_path) VALUES (
                          :team_id,
                          :event_name,
                          :date,
                          :location,
                          :type_id,
                          :distance,
                          :total_participants,
                          :track_path);');

        $stmt->bindValue(':team_id', $event->getTeamId());
        $stmt->bindValue(':event_name', $event->getEventName());
        $stmt->bindValue(':date', $event->getDate());
        $stmt->bindValue(':location', $event->getLocation());
        $stmt->bindValue(':type_id', $type_id['id']);
        $stmt->bindValue(':distance', $event->getDistance());
        $stmt->bindValue(':total_participants', $event->getTotalParticipants());
        $stmt->bindValue(':track_path', $event->getTrackPath());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function getEventsInMonth(string $date): array
    {
        $stmt = $this->database->connect()->prepare("SELECT events.id, events.event_name, events.date, events.location,
            events.distance, event_types.type_name, events.signed_participants, events.total_participants, teams.name
            FROM events
            JOIN teams
            ON teams.id = events.team_id
            JOIN event_types
            ON events.type_id = event_types.id
            WHERE to_char(events.date, 'YYYY/MM') = :date
            ORDER BY events.date;");

        $stmt->bindParam(':date', $date);

        $stmt->execute();

        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $eventDays = array();

        for ($i = 0; $i < 31; $i++)
        {
            $eventDays[] = array();
        }

        foreach ($events as $event)
        {
            $day = substr($event['date'], 8, 2);
            $eventDays[$day][] = new Event($event['id'], $event['event_name'], $event['date'], $event['location'], $event['type_name'],
                $event['distance'], $event['signed_participants'], $event['total_participants'], $event['name']);
        }

        return $eventDays;
    }
}