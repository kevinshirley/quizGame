<?php

class Utils
{
	public static function getPOST($value)
	{
		if(isset($_POST[$value]))
		{
			return $_POST[$value];
		}
	}

	public static function getGET($value)
	{
		if(isset($_GET[$value]))
		{
			return $_GET[$value];
		}
	}
}