<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroMatrimonial extends Model {

	//
    protected $table = 'registros_matrimoniales';
    public $timestamps = false;
    public $primaryKey = 'RGT_NUMERO';
    protected $fillable = ['RGT_NUMERO','RGT_TOMO','RGT_PAGINA','RGT_FECHA','ESPOSO_N1','ESPOSO_N2','ESPOSO_A1','ESPOSO_A2','ESPOSA_N1','ESPOSA_N2','ESPOSA_A1','ESPOSA_A2','RGT_TESTIGOS','MISSAM','PARROCO'];
}
