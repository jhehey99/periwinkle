<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 11:09 AM
 */

namespace src\repo;

use src\core\Repository;
use src\models\BehaviorGraph;
use src\models\Client;

spl_autoload_register(
    function ($class_name)
    {
        require_once $class_name . '.php';
    }
);

/**
 * Class ClientRepository
 * @package src\repo
 */
class ClientRepository extends Repository
{
    public function __construct ()
    {
        parent::__construct ();
    }

    /**
     * @param Client $client
     * @return bool
     */
    public function InsertClient(Client $client) : bool
    {
        $sql = "insert into client(CliAccountId, Height, Weight)
                values ((select AccountId from account where Username = ?),?,?)";

        $this->prepare ($sql);

        return $this->execute ($client->ToInsertCli ());
    }

    /**
     * @param Client $client
     * @return bool
     */
    public function UpdateHeightWeight(Client $client) : bool
    {
        $sql = "UPDATE client
                SET Height = ?, Weight = ?
                WHERE ClientId = ?";

        $this->prepare ($sql);

        return $this->execute ([$client->Height, $client->Weight, $client->ClientId]);
    }

    /**
     * @param int $clientId
     * @return bool
     */
    public function AddMbesAttemptCount(int $clientId) : bool
    {
        $sql = "UPDATE client
                SET MbesAttemptCount = MbesAttemptCount + 1
                WHERE ClientId = ?";

        $this->prepare ($sql);

        return $this->execute ([$clientId]);
    }

    /**
     * @param int $clientId
     * @param bool $allow
     * @return bool
     */
    public function SetAlowMbesAttempt(int $clientId, bool $allow) : bool
    {
        $sql = "UPDATE client
                SET MbesAllowAttempt = ?
                WHERE ClientId = ?";

        $this->prepare ($sql);

        return $this->execute ([$allow, $clientId]);
    }

    /**
     * @param string $username
     * @param bool $allow
     * @return bool
     */
    public function SetAlowMbesAttemptByUsername(string $username, bool $allow) : bool
    {
        $sql = "UPDATE client
                INNER JOIN account a on client.CliAccountId = a.AccountId
                SET MbesAllowAttempt = ?
                WHERE a.Username = ?";

        $this->prepare ($sql);

        return $this->execute ([$allow, $username]);
    }

    /**
     * @return array
     */
    public function GetAllClients() : array
    {
        $sql = "select a.AccountId, a.Username, a.FirstName, a.LastName,
                  a.Email, a.Contact, a.Birthday, a.Gender, a.DateRegistered, a.AccTypeId,
                  ClientId, Height, Weight from client
                inner join account a 
                on client.CliAccountId = a.AccountId";
        $this->prepare ($sql);

        $results = $this->results ();

        $clients = [];

        foreach ($results as $result)
            array_push ($clients, new Client ($result));

        return $clients;
    }

    /**
     * @param string $username
     * @return null|Client
     */
    public function GetClientByUsername(string $username) : ?Client
    {
        $sql = "select a.AccountId, a.Username, a.FirstName, a.LastName,
                  a.Email, a.Contact, a.Birthday, a.Gender, a.DateRegistered, a.AccTypeId,
                  ClientId, Height, Weight, MbesAttemptCount, MbesAllowAttempt from client
                inner join account a on client.CliAccountId = a.AccountId
                where a.Username = ?";
        $this->prepare ($sql);

        $result = $this->result ([$username]);

        return empty($result) ? null : new Client($result);
    }
}