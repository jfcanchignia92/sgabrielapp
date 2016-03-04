<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model {

	//
    protected $table = 'registros_sacramentales';
    public $timestamps = false;
    public $primaryKey = 'rgt_id';

}
