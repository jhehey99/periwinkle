<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 10/31/2018
 * Time: 4:31 PM
 */

namespace api\services\account;

use src\repo\AccountRepository;

require_once "../../../.autoload.php";

// decode the username from the url

$rawUsername = isset($_GET) ? $_GET['username'] : '';

if($rawUsername == '')
    exit();

$username = base64_decode (urldecode ($rawUsername));

// get account info using username if exist

$accRepo = new AccountRepository();

$account = $accRepo->GetAccountAsSession ($username);

if($account != null)
    echo json_encode ($account);

exit();
