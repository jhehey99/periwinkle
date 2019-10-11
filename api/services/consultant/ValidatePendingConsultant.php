<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/31/2018
 * Time: 11:15 PM
 */

namespace api\services\consultant;

use src\repo\AccountRepository;
use src\repo\ConsultantRepository;
use src\responses\ApiResponse;
use src\responses\Response;

require_once "../../../.autoload.php";

$rawUsername = isset($_GET) ? $_GET['username'] : '';
$rawAccept = isset($_GET) ? $_GET['accept'] : '';

if($rawUsername == '' || $rawAccept == "")
    exit();

$username = base64_decode (urldecode ($rawUsername));
$acceptStr = strtolower (base64_decode (urldecode ($rawAccept)));

//$acceptStr = strtolower (urldecode ($rawAccept));
$accept = (strcmp ($acceptStr, "true") == 0) ? true : false;

$conRepo = new ConsultantRepository();
$accRepo = new AccountRepository();
$response = new ApiResponse();

$date = date("Y-m-d");

//$username = $rawUsername;

if($accept)
{
    if($conRepo->UpdateIsPending ($username, false) &&
        $accRepo->UpdateDateRegistered ($username, $date))
    {   $response->Add (Response::UpdateSuccess ()); }
    else
        $response->Add (Response::UpdateFailed ());
}
else
{
    // remove sa pending then remove ung consultant
    if ($accRepo->RemoveAccount ($username))
        $response->Add (Response::UpdateSuccess ());
    else
        $response->Add (Response::UpdateFailed ());
}

$response->Respond ();

//
//if($accept)
//{
//    // TODO UNG REMOVE PENDING GAWING UPDATE ISPENDING TO FALSE
//    // remove sa pending then lagay registration date today sa account
//    if ($conRepo->RemovePendingConsultant ($username) &&
//        $accRepo->UpdateDateRegistered ($username, $date))
//    {
//        $response->Add (Response::UpdateSuccess ());
//    } else
//        $response->Add (Response::UpdateFailed ());
//}
//else
//{
//    // remove sa pending then remove ung consultant
//    if ($conRepo->RemovePendingConsultant ($username) &&
//        $accRepo->RemoveAccount ($username))
//    {
//        $response->Add (Response::UpdateSuccess ());
//    } else
//        $response->Add (Response::UpdateFailed ());
//}
//

