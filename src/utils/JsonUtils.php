<?php
/**
 * Created by PhpStorm.
 * User: Jhehey
 * Date: 8/21/2018
 * Time: 12:41 PM
 */

namespace src\utils;

/**
 * Class JsonUtils
 * @package src\utils
 */
class JsonUtils
{
	private static $jsonInput;

	/**
	 * @return mixed|null
	 */
	public static function Decode()
	{
		self::$jsonInput = json_decode(file_get_contents('php://input'), $assoc = TRUE);

		if(!isset(self::$jsonInput))
				return null;

		return self::$jsonInput;
	}

	/**
	 * @param $object
	 * @return mixed|null
	 */
	public static function DecodeObject($object)
{
		self::$jsonInput = json_decode($object);

		if(!isset(self::$jsonInput))
				return null;

		return self::$jsonInput;
	}

	public static function Dump()
	{
		var_dump (self::$jsonInput);
	}
}
