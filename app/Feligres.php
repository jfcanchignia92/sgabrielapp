<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feligres extends Model {

	//
    protected $table = 'feligreses';
    public $timestamps = false;
    public $primaryKey = 'flg_id';

    public function registrosB()
    {
        return $this->hasMany('App\RegistroBautismal', 'flg_id');
    }
}
