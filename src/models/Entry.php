<?php

namespace models;

class Entry
{
    private $dateOfEntry;
    private $bloodAmount;
    private $notes;


    public function __construct($dateOfEntry, $bloodAmount, $notes)
    {
        $this->dateOfEntry = $dateOfEntry;
        $this->bloodAmount = $bloodAmount;
        $this->notes = $notes;
    }

    public function getDateOfEntry()
    {
        return $this->dateOfEntry;
    }

    public function setDateOfEntry($dateOfEntry)
    {
        $this->dateOfEntry = $dateOfEntry;
    }


    public function getBloodAmount()
    {
        return $this->bloodAmount;
    }


    public function setBloodAmount($bloodAmount)
    {
        $this->bloodAmount = $bloodAmount;
    }


    public function getNotes()
    {
        return $this->notes;
    }


    public function setNotes($notes)
    {
        $this->notes = $notes;
    }




}