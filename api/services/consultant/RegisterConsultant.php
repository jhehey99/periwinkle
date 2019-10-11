<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/27/2018
 * Time: 4:04 PM
 */

namespace api\services\consultant;

use src\models\Consultant;
use src\models\PendingConsultant;
use src\repo\AccountRepository;
use src\repo\ConsultantRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

$decoded = JsonUtils::Decode ();

$consultant = new Consultant($decoded);
$consultant->ApplicationDate = date ("Y-m-d");

$accRepo = new AccountRepository();
$conRepo = new ConsultantRepository();

$response = new ApiResponse();

$cUser = $accRepo->CountUsername ($consultant->Username);
$cEmail = $accRepo->CountEmail ($consultant->Email);
$cContact = $accRepo->CountContact ($consultant->Contact);

if($cUser > 0)
    $response->Add (Response::UsernameTaken ());

if($cEmail > 0)
    $response->Add (Response::EmailTaken ());

if($cContact > 0)
    $response->Add (Response::ContactTaken ());

// insert muna sa account
// then insert sa consultants

if($response->IsEmpty ())
{
    if($accRepo->InsertAccount ($consultant) &&
        $conRepo->InsertConsultant ($consultant))
        $response->Add (Response::RegisterSuccess ());
    else
        $response->Add (Response::RegisterFailed ());
}

$response->Respond ();
