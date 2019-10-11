<?php

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
    if($cliRepo->SetAlowMbesAttempt ($client->ClientId, $client->MbesAllowAttempt))
        $response->Add (Response::UpdateSuccess ());
    else
        $response->Add (Response::UploadFailed ());
}

$response->Respond ();
