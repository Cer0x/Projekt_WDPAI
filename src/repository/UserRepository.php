<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users inner join users_details on users.id_user_details = users_details.id WHERE users.email like :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['phone'],
            $user['isadmin'],
            $user['id']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details (name, surname, phone)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone()
        ]);


        if ($user->getisadmin() == 'true'){
            $stmt = $this->database->connect()->prepare('
                INSERT INTO users (email, password, isadmin, id_user_details)
                VALUES (?, ?, ?, ?)
            ');

            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $user->getisadmin(),
                $this->getUserDetailsId($user)
            ]);
        }
        else{
            $stmt = $this->database->connect()->prepare('
                INSERT INTO users (email, password, id_user_details)
                VALUES (?, ?, ?)
            ');
            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $this->getUserDetailsId($user)
            ]);
        }


    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details WHERE name = :name AND surname = :surname AND phone = :phone
        ');

        $name = $user->getName();
        $surname = $user->getSurname();
        $phone = $user->getPhone();

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data['id'];
    }
}