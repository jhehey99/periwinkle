<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/28/2018
 * Time: 7:35 PM
 */

namespace api\services\account;

use src\models\Account;
use src\repo\AccountRepository;
use src\responses\ApiResponse;
use src\responses\Response;
use src\utils\JsonUtils;

require_once "../../../.autoload.php";

// decode
// to object
// repo
// logic
// respond

$decoded = JsonUtils::Decode ();
//JsonUtils::Dump ();

$account = new Account($decoded);

$accRepo = new AccountRepository();

$response = new ApiResponse();

$cUser = $accRepo->CountUsername ($account->Username);
$cEmail = $accRepo->CountEmail ($account->Email);
$cContact = $accRepo->CountContact ($account->Contact);

if($cUser > 0)
    $response->Add (Response::UsernameTaken ());

if($cEmail > 0)
    $response->Add (Response::EmailTaken ());

if($cContact > 0)
    $response->Add (Response::ContactTaken ());

if($response->IsEmpty ())
{
    if($accRepo->InsertAccount ($account))
    {
        $response->Add (Response::RegisterSuccess ());
    }
    else
    {
        $response->Add (Response::RegisterFailed ());
    }
}

$response->Respond ();
