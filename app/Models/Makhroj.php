<?php namespace App\Models;

use CodeIgniter\Model;

/** @var $db database connect */

class Makhroj extends Model
{
    protected $table = 'Makhroj';

    public function getMakhroj($hija = false)
    {
        if ($hija === false) {
            return $this->findAll();
        }
        
        return $this->asArray()
        ->where(['id_makhroj'])
        ->first();
    }

}

?>