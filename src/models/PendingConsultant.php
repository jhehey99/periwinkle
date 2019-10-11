<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 12:32 PM
 */

namespace src\models;

/**
 * Class PendingConsultant
 * @package src\models
 */
class PendingConsultant
{
    public $PendingConsultantId;
    public $RegistrationDate;

    /**
     * PendingConsultant constructor.
     * @param array $data
     */
    public function __construct (array $data = [])
    {
        if($data == null)
            return;

        foreach ($data as $key => $value)
            $this->{$key} = $value;
    }

}