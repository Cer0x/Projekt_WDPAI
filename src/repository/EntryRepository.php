<?php

namespace repository;
use models\Entry;
use Repository;
use User;

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class EntryRepository extends Repository
{

    public function getEntry(int $id ): ?Entry
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM entries WHERE id = :id
        ');
        $stmt->bindParam(':id', $$id, PDO::PARAM_INT);
        $stmt->execute();

        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$entry) {
            return null;
        }

        return new Entry(
            $entry['dateOfEntry'],
            $entry['bloodAmount'],
            $entry['notes']
        );
    }

    public function addEntry(Entry $entry): void{

        $stmt = $this->database->connect()->prepare('
            INSERT INTO entries (dateOfEntry, bloodAmount, notes, id_assigned_by)
            VALUES (?, ?, ?, ?, ?)
        ');

        //TODO get id from session
        $assignedById = 1;

        $stmt->execute([
            $entry->getDateOfEntry(),
            $entry->getBloodAmount(),
            $entry->getNotes(),
            $assignedById
        ]);
    }
}