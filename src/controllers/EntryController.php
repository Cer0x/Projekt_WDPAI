<?php

namespace controllers;
use models\Entry;
use repository\EntryRepository;

require_once 'AppController.php';
require_once __DIR__ .'/../models/Entry.php';
require_once __DIR__.'/../repository/EntryRepository.php';



class EntryController extends AppController
{
    private $message = [];
    private $entryRepository;


    public function __construct()
    {
        parent::__construct();
        $this->entryRepository = new EntryRepository();
    }

    public function addEntry()
    {
        if ($this->isPost()) {

            $entry = new Entry($_POST['dateOfEntry'], $_POST['bloodAmount'], $_POST['notes']);
            $this->entryRepository->addEntry($entry);

            return $this->render('entries', ['messages' => $this->message]);
        }
        return $this->render('add-entry', ['messages' => $this->message]);
    }
}