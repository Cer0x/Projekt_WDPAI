<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
class SecurityController extends AppController
{
    public function login()
    {
//        $user = new User('johndoe@example.com', 'admin', 'John', 'Doe');
        $userRepository = new UserRepository();
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['Nie ma takiego użytkownika!!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Złe hasło!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/entries");
    }
}