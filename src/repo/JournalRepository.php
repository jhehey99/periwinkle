<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 10/1/2018
 * Time: 9:32 PM
 */

namespace src\repo;

use src\core\Repository;
use src\models\JournalEntry;

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);


/**
 * Class ClientRepository
 * @package src\repo
 */
class JournalRepository extends Repository
{
    /**
     * ClientRepository constructor.
     */
    public function __construct ()
    {
        parent::__construct ();
    }

    /**
     * @param JournalEntry $entry
     * @return bool
     */
    public function InsertJournalEntry(JournalEntry $entry) : bool
    {
        $sql = "INSERT INTO journalentry(JournalClientId, Title, Body, DateTimeCreated, ImageFileName)
                VALUES (?, ?, ?, ?, ?)";

        $this->prepare ($sql);

        return $this->execute ($entry->ToInsertEntry ());
    }

    /**
     * @param int $clientId
     * @return array
     */
    public function GetAllJournalsByClientId(int $clientId) : array
    {
        $sql = "SELECT * FROM journalentry WHERE JournalClientId = ?";

        $this->prepare ($sql);

        $results = $this->results ([$clientId]);

        $journals = [];

        foreach ($results as $result)
            array_push ($journals, $result);

        return $journals;
    }

}