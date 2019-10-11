<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/16/2018
 * Time: 6:06 AM
 */

namespace src\models;

/**
 * Class BehaviorGraph
 * @package src\models
 */
class BehaviorGraph
{
    public $GraphId;
    public $GraphClientId;
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
                $this->GraphClientId,
                $this->Filename,
                $this->StartTime,
                $this->StopTime,
            ];
    }
}