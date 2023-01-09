<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/DailyRun.php';

class DailyRunsRepository extends Repository
{
    public function saveRun(DailyRun $run): bool
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO daily_runs(creator_id, start_point, time, distance, pace) VALUES (
                          :creator_id,
                          :start_point,
                          :time,
                          :distance,
                          :pace) RETURNING id');

        $stmt->bindValue(':creator_id', $run->getCreatorId());
        $stmt->bindValue(':start_point', $run->getStartPoint());
        $stmt->bindValue(':time', $run->getTime());
        $stmt->bindValue(':distance', $run->getDistance());
        $stmt->bindValue(':pace', $run->getPace());

        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->signupForRun($result['id'], $run->getCreatorId());
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function getDailyRuns(): array
    {
        $stmt = $this->database->connect()->prepare("SELECT us.name, us.surname, dr.start_point, dr.time,
            dr.distance, dr.pace, dr.id, dr.creator_id FROM daily_runs AS dr
            JOIN users AS us
            ON dr.creator_id = us.id
            WHERE dr.date = CURRENT_DATE AND dr.time > CURRENT_TIME;");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function signupForRun(int $runId, int $userId)
    {
        $stmt = $this->database->connect()->prepare("INSERT INTO daily_runs_participants (run_id, user_id)
            VALUES (:runId, :userId);");

        $stmt->bindValue(':runId', $runId);
        $stmt->bindValue(':userId', $userId);

        $stmt->execute();
    }

    public function getParticipants($runId): array
    {
        $stmt = $this->database->connect()->prepare("SELECT user_id FROM daily_runs_participants WHERE run_id = :runId;");
        $stmt->bindValue(':runId', $runId);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $arr = array();
        foreach ($results as $result) {
            $arr[] = $result['user_id'];
        }

        return $arr;
    }
}