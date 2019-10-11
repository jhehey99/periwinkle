<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/21/2018
 * Time: 12:27 PM
 */

namespace src\repo;

use src\core\Repository;
use src\models\Password;


spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);

/**
 * Class PasswordRepository
 * @package src\repo
 */
class PasswordRepository extends Repository
{
    public function __construct ()
    {
        parent::__construct ();
    }

    /**
     * @param Password $password
     * @return bool
     */
    public function InsertPassword(string $username, Password $password) : bool
    {
        $sql = "insert into password (PsAccountId, PasswordHash, PasswordSalt)
                VALUES ((select AccountId from account where Username = ?),?, ?)";


        $this->prepare ($sql);

        return $this->execute ([$username, $password->PasswordHash, $password->PasswordSalt]);
    }

    /**
     * @param string $username
     * @return null|Password
     */
    public function GetPasswordByUsername(string $username) : ?Password
    {
        $sql = "select * from password
                where PsAccountId = (select AccountId from account where Username = ?)";

        $this->prepare ($sql);

        $result = $this->result ([$username]);

        return empty($result) ? null : new Password($result);
    }

}