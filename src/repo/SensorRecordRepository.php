<?php

namespace src\repo;

use src\core\Repository;
use src\models\SensorRecord;

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);

/**
 * Class SensorRecordRepository
 * @package src\repo
 */
class SensorRecordRepository extends Repository
{
    public function __construct ()
    {
        parent::__construct ();
    }

    public function AddSensorRecord(SensorRecord $record) : bool
    {
        $sql = "insert into sensorrecord(ClientId, RecordType, Filename, StartTime, StopTime)
                values (?,?,?,?,?)";

        $this->prepare ($sql);

        return $this->execute ($record->ToInsert ());
    }

    public function GetRecordsByClientId(string $clientId) : array
    {
        $sql = "select * from sensorrecord where ClientId = ?";
        $this->prepare ($sql);

        $results = $this->results ([$clientId]);

        $records = [];

        foreach ($results as $result)
            array_push ($records, new SensorRecord($result));

        return $records;
    }
}
