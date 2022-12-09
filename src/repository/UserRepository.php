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
}