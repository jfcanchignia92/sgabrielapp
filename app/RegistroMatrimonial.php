<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroMatrimonial extends Model {

	//
    protected $table = 'registros_matrimoniales';
    public $timestamps = false;
    public $primaryKey = 'rgt_id';
}
