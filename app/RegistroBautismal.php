<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Feligres;

class RegistroBautismal extends Model {

	//
    protected $table = 'registros_bautismales';
    public $timestamps = false;
    public $primaryKey = 'rgt_id';

    public function feligres()
    {
        return $this->belongsTo('App\Feligres', 'flg_id');
    }

}
