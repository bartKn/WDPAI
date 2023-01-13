<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Team.php';

class TeamRepository extends Repository
{
    public function addTeam(string $teamName)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO teams (name) VALUES (:teamName) RETURNING id;');
        $stmt->bindParam(':teamName', $teamName);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }
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

    public function getNameOfTeamWithId(int $teamId): string
    {
        $stmt = $this->database->connect()->prepare('SELECT teams.name FROM teams
            WHERE teams.id = :id;');

        $stmt->bindParam(':id', $teamId);
        $stmt->execute();

        $teamName = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($teamName) {
            return $teamName["name"];
        }

        return '-';
    }

    public function getTeamId(string $teamName): int
    {
        $stmt = $this->database->connect()->prepare('SELECT teams.id FROM teams
            WHERE teams.name = :team_name;');

        $stmt->bindParam(':team_name', $teamName);
        $stmt->execute();

        $teamId = $stmt->fetch(PDO::FETCH_ASSOC);

        return $teamId['id'];
    }

    public function getAllTeams(): array
    {
        $stmt = $this->database->connect()->prepare('SELECT name, id FROM teams');

        $stmt->execute();

        $result = [];

        $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($teams as $team) {
            $result[] = new Team($team['name'], $team['id']);
        }

        return $result;
    }

    public function deleteTeam(int $teamId)
    {
        $stmt = $this->database->connect()->prepare("DELETE FROM teams WHERE id = :teamId;");

        $stmt->bindParam(':teamId', $teamId);

        $stmt->execute();
    }
}