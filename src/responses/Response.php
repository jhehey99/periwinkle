<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/21/2018
 * Time: 2:39 PM
 */

namespace src\responses;

/**
 * Class Response
 * @package src\core
 */
class Response
{
    public $Code;
    public $Subject;
    public $Message;

    /**
     * Response constructor.
     * @param int $code
     */
    public function __construct (int $code, string $subject, string $message)
    {
        $this->Code = $code;
        $this->Subject = $subject;
        $this->Message = $message;
    }

    public static function UsernameTaken() : Response
    {
        return new Response(910,"Username", "Taken");
    }

    public static function EmailTaken() : Response
    {
        return new Response(911,"Email Address", "Taken");
    }

    public static function ContactTaken() : Response
    {
        return new Response(912,"Contact Number", "Taken");
    }

    public static function LicenseTaken() : Response
    {
        return new Response(913,"License", "Taken");
    }

    public static function RegisterSuccess() : Response
    {
        return new Response(990,"Registration", "Successful");
    }

    public static function UpdateSuccess() : Response
    {
        return new Response(991,"Update", "Successful");
    }

    public static function UploadSuccess() :Response
    {
        return new Response(992,"Upload", "Successful");
    }

    public static function RegisterFailed() : Response
    {
        return new Response(980,"Registration", "Not Successful");
    }

    public static function UpdateFailed() : Response
    {
        return new Response(981,"Update", "Not Successful");
    }

    public static function UploadFailed() :Response
    {
        return new Response(982,"Upload", "Not Successful");
    }

}
