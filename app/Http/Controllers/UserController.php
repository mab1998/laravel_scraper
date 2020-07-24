<?php

namespace App\Http\Controllers;
use Nesk\PuPHPeteer\Puppeteer;



class UserController extends Controller
{
	    public function addUser()
    {

		$puppeteer = new Puppeteer;
		$browser = $puppeteer->launch();

		$page = $browser->newPage();
		$page->goto('https://example.com');
		$page->screenshot(['path' => 'example.png']);

		$browser->close();
        return "return";
    }
}