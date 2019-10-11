<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/23/2018
 * Time: 4:16 PM
 */

namespace src\repo;


use src\core\Repository;
use src\models\Consultant;
use src\models\PendingConsultant;

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);

/**
 * Class ConsultantRepository
 * @package src\repo
 */
class ConsultantRepository extends Repository
{
    public function __construct ()
    {
        parent::__construct ();
    }

    /**
     * @param Consultant $consultant
     * @return bool
     */
    public function InsertConsultant(Consultant $consultant) : bool
    {
        $sql = "insert into consultant(ConAccountId, License, ApplicationDate, IsPending)
                values ((select AccountId from account where Username = ?),?,?,?)";
        $this->prepare ($sql);

        return $this->execute ($consultant->ToInsertCon ());
    }

    /**
     * @param PendingConsultant $pendingConsultant
     * @return bool
     */
    public function InsertPendingConsultant(string $username, PendingConsultant $pendingConsultant) : bool
    {
        $sql = "insert into pendingconsultant(PendingConsultantId, RegistrationDate)
                values ((select ConsultantId from consultant 
                         inner join account a 
                         on consultant.ConAccountId = a.AccountId 
                         where Username = ?), ?)";
        $this->prepare ($sql);

        return $this->execute ([$username, $pendingConsultant->RegistrationDate]);
    }

    /**
     * @param string $username
     * @param bool $isPending
     * @return bool
     */
    public function UpdateIsPending(string $username, bool $isPending) : bool
    {
        $sql = "UPDATE consultant
                INNER JOIN account a ON consultant.ConAccountId = a.AccountId
                SET IsPending = ?
                WHERE a.Username = ?";

        $this->prepare ($sql);

        return $this->execute ([$isPending, $username]);
    }

    /**
     * @param string $username
     * @return bool
     */
    public function RemovePendingConsultant(string $username) : bool
    {
        $sql = "delete from pendingconsultant
                where PendingConsultantId = 
                (
                  select ConsultantId from consultant
                  inner join account a
                  on consultant.ConAccountId = a.AccountId
                  where a.Username = ?
                )";

        $this->prepare ($sql);

        return $this->execute ([$username]);
    }

    /**
     * @return array
     */
    public function GetAllConsultants() : array
    {
        $sql = "select a.AccountId, a.Username, a.FirstName, a.LastName,
                  a.Email, a.Contact, a.Birthday, a.Gender, a.DateRegistered, a.AccTypeId,
                  ConsultantId, License, ApplicationDate, IsPending from consultant 
                inner join account a on consultant.ConAccountId = a.AccountId
                where IsPending = 0";
//                left join pendingconsultant p
//                on consultant.ConsultantId = p.PendingConsultantId
//                where p.PendingConsultantId is NULL";
        $this->prepare ($sql);

        $results = $this->results ();

        $consultants = [];

        foreach ($results as $result)
            array_push ($consultants, new Consultant ($result));

        return $consultants;
    }

    /**
     * @return array
     */
    public function GetAllPendingConsultants() : array
    {
        $sql = "select a.AccountId, a.Username, a.FirstName, a.LastName,
                       a.Email, a.Contact, a.Birthday, a.Gender, a.AccTypeId,
                       ConsultantId, License, IsPending, ApplicationDate from consultant
                inner join account a on consultant.ConAccountId = a.AccountId
                WHERE IsPending = 1";
        $this->prepare ($sql);

        $results = $this->results ();

        $consultants = [];

        foreach ($results as $result)
            array_push ($consultants, new Consultant ($result));

        return $consultants;
    }

    /**
     * @param string $username
     * @return null|Consultant
     */
    public function GetConsultantByUsername(string $username) : ?Consultant
    {
        $sql = "select a.AccountId, a.Username, a.FirstName, a.LastName,
                       a.Email, a.Contact, a.Birthday, a.Gender, a.AccTypeId,
                       ConsultantId, License, ApplicationDate, IsPending from consultant c
                       inner join account a on c.ConAccountId = a.AccountId
                       where a.Username = ?";

        $this->prepare ($sql);

        $result = $this->result ([$username]);

        return empty($result) ? null : new Consultant($result);
    }


    /**
     * @param string $license
     * @return int
     */
    public function CountLicense(string $license) : int
    {
        $sql = "SELECT Count(*) as count from consultant
                where License = ?";
        $this->prepare ($sql);

        return $this->result ([$license])['count'];
    }
}

