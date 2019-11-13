<?php

namespace src\models;

/**
 * Class SensorRecord
 * @package src\models
 */
class SensorRecord
{
    public $RecordId;
    public $ClientId;
    public $RecordType; // 0-Piezo, 1-Acceleration
    public $Filename;
    public $StartTime;
    public $StopTime;

		/**
     * BehaviorGraph constructor.
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
    public function ToInsert() : array
    {
        return
            [
                $this->ClientId,
                $this->RecordType,
                $this->Filename,
                $this->StartTime,
                $this->StopTime,
            ];
    }
}
