<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
	public function index()
	{
		echo view('templates/header.php');
		echo view('index.php');
		echo view('templates/footer.php');
	}
	//-------------------------------------------------------------------
}
