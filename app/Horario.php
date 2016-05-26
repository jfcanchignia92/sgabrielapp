<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {

    protected $table = 'horarios';
    public $timestamps = false;
    public $primaryKey = 'HRO_ID';
    protected $fillable = ['HRO_ID','HRO_DIA','HRO_HORAINICIO','HRO_HORAFIN','HRO_ESTADO'];

}
