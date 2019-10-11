<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 11:11 AM
 */

namespace api\services\client;

use src\models\Client;
use src\repo\AccountRepository;
use src\repo\ClientRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode ();

$client = new Client($decoded);

$accRepo = new AccountRepository();
$cliRepo = new ClientRepository();

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

if($response->IsEmpty ())
{
    if ($accRepo->InsertAccount ($client) &&
        $cliRepo->InsertClient ($client))
        $response->Add (Response::RegisterSuccess ());
    else
        $response->Add (Response::RegisterFailed ());
}

$response->Respond ();
