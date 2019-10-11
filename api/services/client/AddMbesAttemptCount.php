<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/7/2018
 * Time: 12:18 PM
 */

namespace api\services\client;

use src\models\Client;
use src\repo\ClientRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode ();

$client = new Client($decoded);

$cliRepo = new ClientRepository();

$response = new ApiResponse();

if($response->IsEmpty ())
{
    // TODO: GAWING ALLOW = FALSE, pero for testing TRUE lang. para pwede umulit kung sakali
    // pagka add ng attempt, i-set na ulit natin na false.
    if($cliRepo->AddMbesAttemptCount ($client->ClientId)
        && $cliRepo->SetAlowMbesAttempt ($client->ClientId, true))
        $response->Add (Response::UpdateSuccess ());
    else
        $response->Add (Response::UploadFailed ());
}

$response->Respond ();
