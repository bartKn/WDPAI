<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Stats.php';


class UserRepository extends Repository
{
    public function getUserByEmail(string $email)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
        ');

        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['password']);
    }

    public function getUserById(int $id)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE id = :id;');

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['password']);
    }


    public function saveUser(User $user, $location): bool
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO users(name, surname, email, password) VALUES (
                          :name,
                          :surname,
                          :email,
                          :password);');

        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':surname', $user->getSurname());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':password', password_hash($user->getPassword(), PASSWORD_DEFAULT));

        try {
            $stmt->execute();

            $stmt = $this->database->connect()->prepare('SELECT last_value FROM users_id_seq;');
            $stmt->execute();
            $id = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = $this->database->connect()->prepare('INSERT INTO user_info(user_id, location) VALUES (:id, :location);');

            $stmt->bindValue(':id', $id['last_value']);
            $stmt->bindValue(':location', $location);
            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function logIn(string $email)
    {
        $id = $this->getUserId($email);

        $stmt = $this->database->connect()->prepare("SELECT logged_in, role FROM user_info WHERE user_id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['logged_in'] === FALSE) {
            $stmt = $this->database->connect()->prepare("UPDATE user_info SET logged_in = true WHERE user_id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } else {
            return null;
        }

        return $result['role'];
    }

    public function logOut(string $email)
    {
        $id = $this->getUserId($email);

        $stmt = $this->database->connect()->prepare("UPDATE user_info SET logged_in = false WHERE user_id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function saveUserPicture(int $userId, string $path): bool
    {
       $stmt = $this->database->connect()->prepare('UPDATE user_info SET photo_path = :path WHERE user_id = :id;');
       $stmt->bindValue(':path', $path);
       $stmt->bindValue(':id', $userId);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function getUserInfo(int $userId)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT team_id, photo_path, location FROM user_info WHERE user_id = :id
        ');

        $stmt->bindValue(':id', $userId);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result['team_id']) {
            $result['team_id'] = 0;
        }

        return $result;
    }

    public function getUserId(string $email): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT id FROM users WHERE email = :email
        ');

        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $id = $stmt->fetch(PDO::FETCH_ASSOC);

        return $id['id'];
    }

    public function getTeamId(string $email): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT team_id FROM user_info WHERE user_id = :id
        ');

        $stmt->bindValue(':id', self::getUserId($email));
        $stmt->execute();

        $team_id = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$team_id['team_id']) {
           return 0;
        }

        return $team_id['team_id'];
    }

    public function getMembersOfTeam(int $teamId): array
    {
        $stmt = $this->database->connect()->prepare("SELECT users.id, users.name, users.surname, users.email FROM users
            JOIN user_info
            ON user_info.user_id = users.id
            WHERE user_info.team_id = :teamId");

        $stmt->bindParam(':teamId', $teamId);

        $stmt->execute();

        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];

        foreach ($members as $member) {
            $user =  new User(
                $member['name'],
                $member['surname'],
                $member['email'],
                ''
            );
            $user->setId($member['id']);
            $result[] = $user;
        }
        return $result;
    }

    public function getParticipantsOfEvent($eventId): array
    {
        $stmt = $this->database->connect()->prepare("SELECT users.id, users.email, users.name, users.surname, teams.name AS team_name FROM users
                JOIN user_info
                ON user_info.user_id = users.id
                LEFT JOIN teams
                ON teams.id = user_info.team_id
                WHERE users.id IN (
                    SELECT user_id FROM event_participants WHERE event_id = :eventId);");

        $stmt->bindParam(':eventId', $eventId);

        $stmt->execute();

        $participants = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];

        foreach ($participants as $participant) {
            $user = new User(
                $participant['name'],
                $participant['surname'],
                $participant['email'],
                ''
            );
            $user->setId($participant['id']);
            $participant['team_name'] ? $user->setTeam($participant['team_name']) : $user->setTeam('-');

            $result[] =  $user;
        }
        return $result;
    }

    public function signUpParticipantForEvent(int $eventId, int $userId): bool
    {
        $stmt = $this->database->connect()->prepare('SELECT "signupforevent"(:eventId, :userId);');

        $stmt->bindValue(':eventId', $eventId);
        $stmt->bindValue(':userId', $userId);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function leaveTeam(int $userId)
    {
        $stmt = $this->database->connect()->prepare("UPDATE user_info SET team_id = null WHERE user_id = :userId;");

        $stmt->bindValue(':userId', $userId);
        $stmt->execute();
    }

    public function joinTeam(int $teamId, int $userId)
    {
        $stmt = $this->database->connect()->prepare("UPDATE user_info SET team_id = :teamId WHERE user_id = :userId;");

        $stmt->bindValue(':teamId', $teamId);
        $stmt->bindValue(':userId', $userId);
        $stmt->execute();
    }

    private function getDailyRunsStats(int $userId, bool $allTime)
    {
        $sql = "SELECT SUM(split_part(distance, ' ', 1)::DECIMAL) AS distance, COUNT(*) AS runs
                    FROM daily_runs_participants AS drp
                    JOIN daily_runs AS dr
                    ON dr.id = drp.run_id  
                    WHERE user_id = :userId";

        if ($allTime) {
            $stmt = $this->database->connect()->prepare($sql);
        } else {
            $stmt = $this->database->connect()->prepare($sql." AND dr.date >= date_trunc('day', current_date - interval '30' day);");
        }

        $stmt->bindValue(':userId', $userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function getEventsStats(int $userId, bool $allTime)
    {
        $sql = "SELECT SUM(e.distance) AS distance, COUNT(*) AS events, ROUND(AVG(ep.finish_position)::numeric, 2) AS position 
                FROM event_participants AS ep
                JOIN events AS e
                ON e.id = ep.event_id
                WHERE ep.user_id = :userId AND ep.finish_position IS NOT NULL";

        if ($allTime) {
            $stmt = $this->database->connect()->prepare($sql);
        } else {
            $stmt = $this->database->connect()->prepare($sql." AND e.date >= date_trunc('day', current_date - interval '30' day);");
        }

        $stmt->bindValue(':userId', $userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserStats(int $userId, bool $allTime): Stats
    {
        $events = $this->getEventsStats($userId, $allTime);
        $dailyRuns = $this->getDailyRunsStats($userId, $allTime);

        return new Stats(
            $events['events'] ?: '0',
            $events['distance'] ?: '0',
            $events['position'] ?: '0',
            $dailyRuns['runs'] ?: '0',
            $dailyRuns['distance'] ?: '0'
        );
    }

}