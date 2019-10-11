<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 9:15 PM
 */

namespace api\services\consultant;

use src\repo\ConsultantClientRepository;

require_once "../../../.autoload.php";

$rawClientId = isset($_GET) ? $_GET['clientId'] : '';

if($rawClientId == '')
    exit();

$clientId = base64_decode (urldecode ($rawClientId));
//$clientId = $rawClientId;

$conCliRepo = new ConsultantClientRepository();

$consultant = $conCliRepo->GetConsultantByClientId ($clientId);

if($consultant != null)
    echo json_encode ($consultant);

exit();
