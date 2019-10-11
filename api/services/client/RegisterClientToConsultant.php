<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 3:56 PM
 */

namespace api\services\client;

use src\models\Client;
use src\models\Consultant;
use src\repo\AccountRepository;
use src\repo\ClientRepository;
use src\repo\ConsultantClientRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode ();

$consultant = new Consultant($decoded['CcConsultant']);
$client = new Client($decoded['CcClient']);

$accRepo = new AccountRepository();
$cliRepo = new ClientRepository();
$conCliRepo = new ConsultantClientRepository();

$response = new ApiResponse();

$cUser = $accRepo->CountUsername ($client->Username);
$cEmail = $accRepo->CountEmail ($client->Email);
$cContact = $accRepo->CountContact ($client->Contact);

if($cUser > 0)
    $response->Add (Response::UsernameTaken ());

if($cEmail > 0)
    $response->Add (Response::EmailTaken ());

if($cContact > 0)
    $response->Add (Response::ContactTaken ());

// insert muna sa account
// then insert sa clients

$date = date("Y-m-d");

if($response->IsEmpty ())
{
    if ($accRepo->InsertAccount ($client) &&
        $cliRepo->InsertClient ($client) &&
        $conCliRepo->InsertConsultantClient ($consultant->Username, $client->Username) &&
        $accRepo->UpdateDateRegistered ($client->Username, $date) &&
        $cliRepo->SetAlowMbesAttemptByUsername ($client->Username, true)
        )
        $response->Add (Response::RegisterSuccess ());
    else
        $response->Add (Response::RegisterFailed ());
}

$response->Respond ();