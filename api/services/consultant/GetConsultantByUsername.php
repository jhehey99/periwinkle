<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/30/2018
 * Time: 9:15 PM
 */

namespace api\services\consultant;

use src\repo\ConsultantRepository;

require_once "../../../.autoload.php";

$rawUsername = isset($_GET) ? $_GET['username'] : '';

if($rawUsername == '')
    exit();

$username = base64_decode (urldecode ($rawUsername));
//$username = $rawUsername;

$conRepo = new ConsultantRepository();

$consultant = $conRepo->GetConsultantByUsername ($username);

if($consultant != null)
    echo json_encode ($consultant);

exit();
