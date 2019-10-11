<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 4:03 PM
 */

namespace src\repo;

use src\core\Repository;
use src\models\Client;
use src\models\Consultant;

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);

/**
 * Class ConsultantClientRepository
 * @package src\repo
 */
class ConsultantClientRepository extends Repository
{
    public function __construct ()
    {
        parent::__construct ();
    }

    /**
     * @param string $conUsername
     * @param string $cliUsername
     * @return bool
     */
    public function InsertConsultantClient(string $conUsername, string $cliUsername) : bool
    {
        $sql = "insert into consultantclient(CcConsultantId, CcClientId)
                values (
                (select ConsultantId from consultant
                  inner join account a 
                  on consultant.ConAccountId = a.AccountId
                  where a.Username = ?),
                (select ClientId from client
                  inner join account a2 
                  on client.CliAccountId = a2.AccountId
                  where a2.Username = ?))";

        $this->prepare ($sql);

        return $this->execute ([$conUsername, $cliUsername]);
    }

    /**
     * @param int $consultantId
     * @return Client
     */
    public function GetClientsByConsultantId(int $consultantId) : array
    {
        $sql = "select a.AccountId, a.Username, a.FirstName, a.LastName,
                  a.Email, a.Contact, a.Birthday, a.Gender, a.DateRegistered, a.AccTypeId,
                  c.ClientId, c.Height, c.Weight from consultantclient
                inner join client c on consultantclient.CcClientId = c.ClientId
                inner join account a on c.CliAccountId = a.AccountId
                where CcConsultantId = ?";
        $this->prepare ($sql);

        return $this->results ([$consultantId]);
    }

    /**
     * @param int $clientId
     * @return null|Consultant
     */
    public function GetConsultantByClientId(int $clientId) : ?Consultant
    {
        $sql = "select a.AccountId, a.Username, a.FirstName, a.LastName,
                  a.Email, a.Contact, a.Birthday, a.Gender, a.AccTypeId,
                  ConsultantId, License, ApplicationDate, IsPending from consultantclient
                inner join consultant c on consultantclient.CcConsultantId = c.ConsultantId
                inner join account a on c.ConAccountId = a.AccountId
                where CcClientId = ?";
        $this->prepare ($sql);

        $result = $this->result ([$clientId]);

        return empty($result) ? null : new Consultant($result);

    }

}