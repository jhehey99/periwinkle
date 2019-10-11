<?php

namespace src\models;

/**
 * Class BehaviorGraph
 * @package src\models
 */
class AccelerometerRecord
{
    public $RecordId;
    public $ClientId;
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
                $this->Filename,
                $this->StartTime,
                $this->StopTime,
            ];
    }
}
