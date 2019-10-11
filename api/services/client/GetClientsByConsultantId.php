<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 9:14 PM
 */

namespace api\services\client;

use src\repo\ConsultantClientRepository;

require_once "../../../.autoload.php";

$rawConsultantId = isset($_GET) ? $_GET['consultantId'] : '';

if($rawConsultantId == '')
    exit();

$consultantId = (int) base64_decode (urldecode ($rawConsultantId));
//$consultantId = (int) $rawConsultantId;

// get client info using username if exist

$conCliRepo = new ConsultantClientRepository();

$clients = $conCliRepo->GetClientsByConsultantId ($consultantId);

if($clients != null)
    echo json_encode ($clients);

exit();
