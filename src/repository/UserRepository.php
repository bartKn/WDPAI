<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';


class UserRepository extends Repository
{
    public function getUser(string $email)
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

    public function saveUser(User $user): bool
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
            return true;
        } catch (PDOException $ex) {
            return false;
        }
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
            SELECT team_id, photo_path FROM user_info WHERE user_id = :id
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

        if (!$team_id) {
           return 0;
        }

        return $team_id['team_id'];
    }

    public function getMembersOfTeam(int $teamId): array
    {
        $stmt = $this->database->connect()->prepare("SELECT users.name, users.surname, users.email FROM users
            JOIN user_info
            ON user_info.user_id = users.id
            WHERE user_info.team_id = :teamId");

        $stmt->bindParam(':teamId', $teamId);

        $stmt->execute();

        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];

        foreach ($members as $member) {
            $result[] =  new User(
                $member['name'],
                $member['surname'],
                $member['email'],
                ''
            );
        }
        return $result;
    }
}