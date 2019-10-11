<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/21/2018
 * Time: 12:25 PM
 */

namespace src\models;

/**
 * Class Password
 * @package src\models
 */
class Password
{
    public $PsAccountId;
    public $PasswordHash;
    public $PasswordSalt;

    /**
     * Account constructor.
     * @param array $data
     */
    public function __construct ($data = [])
    {
        if($data == null)
            return;

        foreach ($data as $key => $value)
            $this->{$key} = $value;
    }
}
