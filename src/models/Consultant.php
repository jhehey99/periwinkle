<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/23/2018
 * Time: 4:18 PM
 */

namespace src\models;

/**
 * Class Consultant
 * @package src\models
 */
class Consultant extends Account
{
    public $ConsultantId;
    public $License;
    public $ApplicationDate;
    public $IsPending;

    /**
     * Account constructor.
     * @param array $data
     */
    public function __construct ($data = [])
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
    public function ToInsertCon () : array
    {
        return
            [
                $this->Username,
                $this->License,
                $this->ApplicationDate,
                $this->IsPending
            ];
    }
}
