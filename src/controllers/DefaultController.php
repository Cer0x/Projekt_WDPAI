<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        session_start();
        return $this->render('login');
    }

    public function login()
    {
        session_start();
        return $this->render('login');

        return $this->render('login', ['messages' => ['Zaloguj się']]);
    }


    public function map()
    {
        session_start();
        if(isset($_SESSION['UID'])){
            return $this->render('map');
        }

        return $this->render('login', ['messages' => ['Zaloguj się']]);
    }
    public function userstat()
    {
        session_start();
        if(isset($_SESSION['UID'])){
            return $this->render('userstat');
        }

        return $this->render('login', ['messages' => ['Zaloguj się']]);
    }



    public function addEntry()
    {
        session_start();
        if(isset($_SESSION['UID'])){
            return $this->render('addEntry');
        }

        return $this->render('login', ['messages' => ['Zaloguj się']]);
    }
    public function register()
    {
        session_start();
        return $this->render('register');

    }
}