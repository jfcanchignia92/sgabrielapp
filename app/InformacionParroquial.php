<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InformacionParroquial extends Model {

    protected $table = 'informacionparroquial';
    public $timestamps = false;
    public $primaryKey = 'INF_ID';
    protected $fillable = ['INF_PARROCO','INF_NOMBREPARROCO','INF_PARROCOIMG','INF_PARROQUIA','INF_TELEFONO','INF_EMAIL','INF_FACEBOOK'];
    public function setInfParrocoimgAttribute($file){
        $this->attributes['INF_PARROCOIMG'] = 'image_parroco.jpg';
        $nombre = 'image_parroco.jpg';
        \Storage::disk('local')->put($nombre, \File::get($file));
    }

}
