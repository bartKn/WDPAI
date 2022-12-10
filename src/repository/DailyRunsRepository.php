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
                          :pace);');

        $stmt->bindValue(':creator_id', $run->getCreatorId());
        $stmt->bindValue(':start_point', $run->getStartPoint());
        $stmt->bindValue(':time', $run->getTime());
        $stmt->bindValue(':distance', $run->getDistance());
        $stmt->bindValue(':pace', $run->getPace());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function getDailyRuns(): array
    {
        $stmt = $this->database->connect()->prepare("SELECT us.name, us.surname, dr.start_point, dr.time,
            dr.distance, dr.pace FROM daily_runs AS dr
            JOIN users AS us
            ON dr.creator_id = us.id
            WHERE dr.date = CURRENT_DATE;");

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}