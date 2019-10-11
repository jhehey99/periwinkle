<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 11:07 AM
 */

namespace src\models;

/**
 * Class Client
 * @package src\models
 */
class Client extends Account
{
    public $ClientId;
    public $Height;
    public $Weight;
    public $MbesAttemptCount;
    public $MbesAllowAttempt;

    /**
     * Client constructor.
     * @param array $data
     */
    public function __construct (array $data = [])
    {
        if($data == null)
            return;

        parent::__construct ($data);

        foreach ($data as $key => $value)
            $this->{$key} = $value;
    }

    /**
     * @return array
     */
    public function ToInsertCli() : array
    {
        return
            [
                $this->Username,
                $this->Height,
                $this->Weight
            ];
    }
}