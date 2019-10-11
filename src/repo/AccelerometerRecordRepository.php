<?php

namespace src\repo;

use src\core\Repository;
use src\models\AccelerometerRecord;

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);

/**
 * Class AccelerometerRecordRepository
 * @package src\repo
 */
class AccelerometerRecordRepository extends Repository
{
    public function __construct ()
    {
        parent::__construct ();
    }

    public function AddAccelerometerRecord(AccelerometerRecord $record) : bool
    {
        $sql = "insert into accelerometerrecord(ClientId, Filename, StartTime, StopTime)
                values (?,?,?,?)";

        $this->prepare ($sql);

        return $this->execute ($record->ToInsert ());
    }

    public function GetRecordsByClientId(string $clientId) : array
    {
        $sql = "select * from accelerometerrecord where ClientId = ?";
        $this->prepare ($sql);

        $results = $this->results ([$clientId]);

        $records = [];

        foreach ($results as $result)
            array_push ($records, new AccelerometerRecord($result));

        return $records;
    }
}
