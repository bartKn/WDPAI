<?php

require_once 'Repository.php';

class TeamRepository extends Repository
{
    public function getTeamNameOfUser(int $userId): string
    {
        $stmt = $this->database->connect()->prepare('SELECT teams.name FROM teams
            WHERE teams.id = (SELECT user_info.team_id FROM user_info WHERE user_info.user_id = :id);');

        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        $teamName = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($teamName) {
            return $teamName["name"];
        }

        return '';
    }
}