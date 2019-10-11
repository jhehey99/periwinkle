<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/7/2018
 * Time: 1:03 AM
 */

namespace src\models;

/**
 * Class MbesResponse
 * @package src\models
 */
class MbesResponse
{
    public $MbesResponseId;
    public $AttemptId;
    public $QuestionIds;
    public $ScaleValues;

    /**
     * Client constructor.
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
                $this->MbesResponseId,
                $this->AttemptId,
                $this->QuestionIds,
                $this->ScaleValues
            ];
    }
}