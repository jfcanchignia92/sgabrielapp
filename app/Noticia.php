<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model {

    protected $table = 'noticias';
    public $timestamps = false;
    public $primaryKey = 'NT_ID';
    protected $fillable = ["NT_VISIBLE","NT_TITULO","NT_CONTENIDO","NT_TIPO","NT_IMAGEN"/*, "NT_FECHA"*/];

    public function setNtImagenAttribute($file){
        $this->attributes['NT_IMAGEN'] = 'image_'.str_replace(' ', '',date("YmdHis")).'.jpg';
        $nombre = 'image_'.str_replace(' ', '',date("YmdHis")).'.jpg';
        \Storage::disk('noticias')->put($nombre, \File::get($file));
    }

}
