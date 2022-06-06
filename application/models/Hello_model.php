<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hello_model extends CI_Controller
{

	Public function hello_nim()
	{
		return "Hello Perkenalkan saya C030320122";
	}

	Public function hello_mvc()
	{
		return "Ini menggunakan MVC buatan C030320122";
	}
}