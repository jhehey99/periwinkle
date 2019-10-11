<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/21/2018
 * Time: 3:18 PM
 */

namespace src\responses;

/**
 * Class ApiResponse
 * @package src\responses
 */
class ApiResponse
{
    private $responses = [];

    /**
     * @param Response $response
     */
    public function Add(Response $response)
    {
        array_push ($this->responses, $response);
    }

    public function Respond()
    {
        echo json_encode ($this->responses);
    }

    /**
     * @return bool
     */
    public function IsEmpty() : bool
    {
        return  count ($this->responses) > 0 ? false : true;
    }

}