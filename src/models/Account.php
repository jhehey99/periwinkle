<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/21/2018
 * Time: 12:01 PM
 */

namespace src\models;

/**
 * Class Account
 * @package Models
 */
class Account
{
    public $AccountId;
    public $Username;
    public $FirstName;
    public $LastName;
    public $Email;
    public $Contact;
    public $Birthday;
    public $Gender;
    public $AccTypeId;
    public $DateRegistered;

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

    /**
     * @return array
     * properties required for an Insert
     */
    public function ToInsertAcc() : array
    {
        return
            [
                $this->Username,
                $this->FirstName,
                $this->LastName,
                $this->Email,
                $this->Contact,
                $this->Birthday,
                $this->Gender,
                $this->AccTypeId
            ];
    }

    /**
     * @return array
     * Unique properties
     */
    public function ToUniqueAcc() : array
    {
        return
            [
                $this->Username,
                $this->Email,
                $this->Contact
            ];
    }
}
