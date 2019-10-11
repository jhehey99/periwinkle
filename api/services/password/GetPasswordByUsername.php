<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/31/2018
 * Time: 10:35 PM
 */


namespace api\services\password;

use src\repo\PasswordRepository;

require_once "../../../.autoload.php";

$rawUsername = isset($_GET) ? $_GET['username'] : '';

if($rawUsername == '')
    exit();

$username = base64_decode (urldecode ($rawUsername));
//$username = $rawUsername;

$passRepo = new PasswordRepository();

$password = $passRepo->GetPasswordByUsername ($username);

if($password != null)
    echo json_encode ($password);

exit();
