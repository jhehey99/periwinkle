<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 10/1/2018
 * Time: 9:26 PM
 */

namespace src\models;

/**
 * Class JournalEntry
 * @package src\models
 */
class JournalEntry
{
    public $JournalEntryId;
    public $JournalClientId;
    public $Title;
    public $Body;
    public $DateTimeCreated;
    public $ImageFileName;

    /**
     * Account constructor.
     * @param array $data
     */
    public function __construct ($data = [])
    {
        if($data == null)
            return;

        foreach ($data as $key => $value)
            $this->{$key} = $value;
    }

    /**
     * @return array
     */
    public function ToInsertEntry() : array
    {
        return
            [
                $this->JournalClientId,
                $this->Title,
                $this->Body,
                $this->DateTimeCreated,
                $this->ImageFileName
            ];
    }
}
