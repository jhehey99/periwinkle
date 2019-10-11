<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 9:14 PM
 */

namespace api\services\client;

use src\repo\ClientRepository;

require_once "../../../.autoload.php";

$rawUsername = isset($_GET) ? $_GET['username'] : '';

if($rawUsername == '')
    exit();

$username = base64_decode (urldecode ($rawUsername));
//$username = $rawUsername;

$cliRepo = new ClientRepository();

$client = $cliRepo->GetClientByUsername ($username);

if($client != null)
    echo json_encode ($client);

exit();
