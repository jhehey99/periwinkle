<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/24/2018
 * Time: 12:07 PM
 */

namespace api\services\client;

use src\repo\JournalRepository;

require_once "../../../.autoload.php";

$rawClientId = isset($_GET) ? $_GET['clientId'] : '';

if($rawClientId == '')
    exit();

$clientId = base64_decode (urldecode ($rawClientId));

$jouRepo = new JournalRepository();

$journals = $jouRepo->GetAllJournalsByClientId ($clientId);

echo json_encode ($journals);

exit();
