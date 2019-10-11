<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 11/17/2018
 * Time: 8:26 PM
 */

namespace api\services\client;

use src\repo\BehaviorRepository;

require_once "../../../.autoload.php";

$rawClientId = isset($_GET) ? $_GET['clientId'] : '';

if($rawClientId == '')
    exit();

$clientId = base64_decode (urldecode ($rawClientId));

$bgRepo = new BehaviorRepository();

$graphs = $bgRepo->GetBehaviorGraphByClientId ($clientId);

echo json_encode ($graphs);

exit();
