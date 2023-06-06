<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Entry.php';

class EntryRepository extends Repository
{

    public function getEntry(int $id): ?Entry
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

    public function getEntries(): array
    {
        $result = [];

        $stmt = $this ->database->connect()->prepare(
//            'SELECT * FROM entries ORDER BY "dateOfEntry" WHERE id_assigned_by = :id_assigned_by  ASC LIMIT 10;'
            'SELECT * FROM entries WHERE id_assigned_by = :id_assigned_by ORDER BY "dateOfEntry"  ASC LIMIT 10;'
        );

        //TODO get id from session
        $assignedById = 1;
        $stmt->bindValue(':id_assigned_by', $assignedById, PDO::PARAM_INT);
        $stmt ->execute();


        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($entries as $entry){
            $result[] = new Entry(
                $entry['dateOfEntry'],
                $entry['bloodamount'],
                $entry['notes']
            );
        }
        return $result;
    }
    public function addEntry(Entry $entry): void{

        $stmt = $this->database->connect()->prepare('
            INSERT INTO entries (bloodamount, notes, id_assigned_by)
            VALUES (:bloodamount, :notes, :id_assigned_by)
        ');

        //TODO get id from session
        $assignedById = 1;

        $stmt->bindValue(':bloodamount', $entry->getBloodAmount(), PDO::PARAM_INT);
        $stmt->bindValue(':notes', $entry->getNotes());
        $stmt->bindValue(':id_assigned_by', $assignedById, PDO::PARAM_INT);

        $stmt->execute();
    }
}