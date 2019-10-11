<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/21/2018
 * Time: 12:00 PM
 */

namespace src\repo;

use src\models\Account;
use src\core\Repository;

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);

/**
 * Class AccountRepository
 * @package src\repo
 */
class AccountRepository extends Repository
{
    public function __construct ()
    {
        parent::__construct ();
    }

    /**
     * @param Account $account
     * @return bool
     */
    public function InsertAccount(Account $account) : bool
    {
//      VALUES ("user", "first", "last", "hehe@gmail.com", 9052323506, DATE("1998-12-17"), 'M');
        $sql = "insert into account (Username, FirstName, LastName, Email, Contact, Birthday, Gender, AccTypeId)
                values (?,?,?,?,?,?,?,?);";
        $this->prepare ($sql);

        return $this->execute ($account->ToInsertAcc ());
    }

    /**
     * @param string $username
     * @return bool
     */
    public function RemoveAccount(string $username) : bool
    {
        $sql = "delete from account
                where Username = ?";

        $this->prepare ($sql);

        return $this->execute ([$username]);
    }

    /**
     * @param string $username
     * @param \DateTime $date
     * @return bool
     */
    public function UpdateDateRegistered(string $username, string $date) : bool
    {
        $sql = "update account
                set DateRegistered = ?
                where Username = ?";

        $this->prepare ($sql);

        return $this->execute ([$date, $username]);
    }

    /**
     * @param string $username
     * @return null|Account
     */
    public function GetAccountIdByUsername(string $username) : ?Account
    {
        $sql = "select AccountId from account
                where Username = ?";
        $this->prepare ($sql);

        $result = $this->result ([$username]);

        return empty($result) ? null : new Account($result);
    }

    /**
     * @param string $username
     * @return null|Account
     */
    public function GetAccountTypeByUsername(string $username) : ?Account
    {
        $sql = "select AccTypeId from account
                where Username = ?";
        $this->prepare ($sql);

        $result = $this->result ([$username]);

        return empty($result) ? null : new Account($result);
    }

    /**
     * @param string $username
     * @return null|Account
     */
    public function GetAccountAsSession (string $username) : ?Account
    {
        $sql = "select AccountId, Username, AccTypeId from account
                where Username = ?";
        $this->prepare ($sql);

        $result = $this->result ([$username]);

        return empty($result) ? null : new Account($result);
    }

    /**
     * @param string $username
     * @return int
     */
    public function CountUsername(string $username) : int
    {
        $sql = "SELECT Count(*) as count from account
                where Username = ?";
        $this->prepare ($sql);

        return $this->result ([$username])['count'];
    }

    /**
     * @param string $email
     * @return int
     */
    public function CountEmail(string $email) : int
    {
        $sql = "SELECT Count(*) as count from account
                where Email = ?";
        $this->prepare ($sql);

        return $this->result ([$email])['count'];
    }

    /**
     * @param string $contact
     * @return int
     */
    public function CountContact(string $contact) : int
    {
        $sql = "SELECT Count(*) as count from account
                where Contact = ?";
        $this->prepare ($sql);

        return $this->result ([$contact])['count'];
    }

}

