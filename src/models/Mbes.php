<?php

namespace src\models;

/**
 * Class MbesResponse
 * @package src\models
 */
class Mbes
{
    public $MbesId;
    public $MbesClientId;
    public $Height;
    public $Weight;
    public $BMI;
    public $DateCreated;

    /**
     * MbesResponse constructor.
     * @param array $data
     */
    public function __construct (array $data = [])
    {
        if($data == null)
        {
            $this->QuestionIds = [];
            $this->ScaleValues = [];
            return;
        }

        foreach ($data as $key => $value)
            $this->{$key} = $value;
    }

    /**
     * @return array
     */
    public function ToInsertResponse () : array
    {
        return
            [
                $this->MbesClientId,
                $this->Height,
                $this->Weight,
                $this->BMI,
                $this->DateCreated
            ];
    }
}