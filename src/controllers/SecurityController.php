<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }
    public function login()
    {
        session_start();
        $userRepository = new UserRepository();
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = md5($_POST['password']);

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
        $_SESSION['UID'] = $user->getUserID();
        $_SESSION['isAdmin'] = $user->getisadmin();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/entries");
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        return $this->render('login', ['messages' => ['Wylogowano pomyślnie']]);
    }

    public function register()
    {
        session_start();
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $isadmin = $_POST['isadmin'];
        $uid = "";

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Hasła się nie zgadzają']]);
        }
;
        $user = new User($email, md5($password), $name, $surname, $phone, $isadmin, $uid);
        $user->setPhone($phone);
        $user->setisadmin($isadmin);
        $user->setUserID($uid);

        $this->userRepository->addUser($user);


        return $this->render('login', ['messages' => ['Rejestracja przebiegła pomyślnie!']]);
    }


}