<?php

class Event
{
    private $id;
    private $team_id;
    private $event_name;
    private $date;
    private $location;
    private $type;
    private $distance;
    private $total_participants;
    private $signed_participants;
    private $track_path;

    public function __construct()
    {
    }


    public function setTeamId(int $team_id)
    {
        $this->team_id = $team_id;
    }

    public function setEventName(string $event_name)
    {
        $this->event_name = $event_name;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function setLocation(string $location)
    {
        $this->location = $location;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function setDistance(int $distance)
    {
        $this->distance = $distance;
    }

    public function setTotalParticipants(int $total_participants)
    {
        $this->total_participants = $total_participants;
    }

    public function setSignedParticipants(int $signed_participants)
    {
        $this->signed_participants = $signed_participants;
    }

    public function setTrackPath(string $track_path)
    {
        $this->track_path = $track_path;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTeamId(): int
    {
        return $this->team_id;
    }

    public function getEventName(): string
    {
        return $this->event_name;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDistance(): int
    {
        return $this->distance;
    }

    public function getTotalParticipants(): int
    {
        return $this->total_participants;
    }

    public function getSignedParticipants(): int
    {
        return $this->signed_participants;
    }

    public function getTrackPath(): string
    {
        return $this->track_path;
    }
}