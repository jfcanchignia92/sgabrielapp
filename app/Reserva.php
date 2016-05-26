<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model {

    protected $table = 'reservas';
    public $timestamps = false;
    public $primaryKey = 'RSV_ID';
    protected $fillable = ["RSV_ID","HRO_ID","NOMBRES","APELLIDOS","EMAIL"];

}
