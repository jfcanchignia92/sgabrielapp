<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Feligres;

class RegistroBautismal extends Model {

	//
    protected $table = 'registros_bautismales';
    public $timestamps = false;
    public $primaryKey = 'RGT_NUMERO';
    protected $fillable = ['RGT_NUMERO','RGT_TOMO','RGT_PAGINA','RGT_FECHA','NOMBRE1','NOMBRE2','APELLIDO1','APELLIDO2','FECHA_NACIMIENTO','SEXO','PADRE','MADRE','PADRINO','MADRINA','PARROCO','CIUDAD'];
}
