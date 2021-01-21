<?php namespace App\Controllers;

use App\Models\Makhroj;
// db
$db = \Config\Database::connect();
$db->connect();

class Result extends BaseController
{
    public function index()
    {
        $model = new Makhroj($db);

        $data = [
            'makhroj'=>$model->getMakhroj(),
            'title'=> 'Makhroj',
        ];

		echo view('templates/header.php',$data);
		echo view('index.php',$data);
		echo view('templates/footer.php',$data);
    }

    public function view($makhroj = null)
    {
        $model = new Makhroj($db);
        $data['makhroj'] = $model->getMakhroj($makhroj);

        if(empty($data['makhroj'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Cannot find the makhroj : " . $makhroj);
        }

        $data['title'] = $data['makhroj']['title'];

        echo view('templates/header.php',$data);
		echo view('index.php',$data);
		echo view('templates/footer.php',$data);
    }
}


?>