<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Entry.php';

class EntryRepository extends Repository
{

    public function getUserStats(): int
    {
        session_start();
        $assignedById = $_SESSION['UID'];

        $stmt = $this->database->connect()->prepare('
            SELECT SUM(bloodamount) as suma FROM entries WHERE id_assigned_by = :id_assigned_by
        ');
        $stmt->bindParam(':id_assigned_by', $assignedById, PDO::PARAM_INT);
        $stmt->execute();

        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$entry) {
            return 0;
        }

        return $entry['suma'];
    }
    public function getNextDate(): string
    {
        session_start();
        $assignedById = $_SESSION['UID'];

        $stmt = $this->database->connect()->prepare('
            SELECT (MAX("dateOfEntry") + INTERVAL \'8 weeks\')::date AS "newDate" FROM entries WHERE id_assigned_by = :id_assigned_by
        ');
        $stmt->bindParam(':id_assigned_by', $assignedById, PDO::PARAM_INT);
        $stmt->execute();

        $date = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$date or !$date['newDate']) {
            return date('Y-m-d');
        }

        return $date['newDate'];
    }

    public function getEntries(): array
    {
        $result = [];

        $stmt = $this ->database->connect()->prepare(
            'SELECT * FROM entries WHERE id_assigned_by = :id_assigned_by ORDER BY "dateOfEntry"  DESC LIMIT 10;'
        );


        $assignedById = $_SESSION['UID'];
        $stmt->bindValue(':id_assigned_by', $assignedById, PDO::PARAM_INT);
        $stmt->execute();


        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($entries as $entry){
            $result[] = new Entry(
                $entry['dateOfEntry'],
                $entry['bloodamount'],
                $entry['notes'],
                $entry['id_assigned_by']

            );
        }
        return $result;
    }
    public function addEntry(Entry $entry): void{
        session_start();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO entries (bloodamount, notes, id_assigned_by)
            VALUES (:bloodamount, :notes, :id_assigned_by)
        ');


        $assignedById = $_SESSION['UID'];

        $stmt->bindValue(':bloodamount', $entry->getBloodAmount(), PDO::PARAM_INT);
        $stmt->bindValue(':notes', $entry->getNotes());
        $stmt->bindValue(':id_assigned_by', $assignedById, PDO::PARAM_INT);

        $stmt->execute();
    }


}