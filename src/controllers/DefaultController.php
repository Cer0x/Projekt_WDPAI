<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function login()
    {
        $this->render('login');
    }


    public function map()
    {
        $this->render('map');
    }
    public function userstat()
    {
        $this->render('userstat');
    }

    public function addEntry()
    {
        $this->render('addEntry');
    }
    public function register()
    {
        $this->render('register');
    }
}