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
        session_start();
        if(isset($_SESSION['UID'])) {
            $entries = $this->entryRepository->getEntries();
            return $this->render('entries', [
                'entries' => $entries,
                'nextDate' => $this->entryRepository->getNextDate(),
            ]);
        }
        return $this->render('login', ['messages' => ['Zaloguj się']]);

    }
    public function addEntry()
    {
        session_start();
        if(isset($_SESSION['UID'])) {

            if ($this->isPost()) {

                $entry = new Entry($_POST['dateOfEntry'], $_POST['bloodAmount'], $_POST['notes'], $_SESSION['UID']);
                $this->entryRepository->addEntry($entry);

                return $this->render('entries', [
                    'entries' => $this->entryRepository->getEntries(),
                    'messages' => $this->message
                ]);
            }
            return $this->render('addEntry', ['messages' => $this->message]);
        }

        return $this->render('login', ['messages' => ['Zaloguj się']]);

    }

    public function userstat()
    {
        session_start();
        if(isset($_SESSION['UID'])) {
            $stat = $this->entryRepository->getUserStats();
            return $this->render('userstat', ['stat' => $stat]);
        }
        return $this->render('login', ['messages' => ['Zaloguj się']]);

    }

}