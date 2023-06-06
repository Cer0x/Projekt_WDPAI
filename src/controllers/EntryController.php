<?php

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
    public function entries()
    {
        $entries = $this->entryRepository->getEntries();
        $this->render('entries', ['entries' => $entries]);
    }
    public function addEntry()
    {
        if ($this->isPost()) {

            $entry = new Entry($_POST['dateOfEntry'], $_POST['bloodAmount'], $_POST['notes']);
            $this->entryRepository->addEntry($entry);

            return $this->render('entries', [
                'entries' => $this->entryRepository->getEntries(),
                'messages' => $this->message
            ]);
        }
        return $this->render('addEntry', ['messages' => $this->message]);

    }
}