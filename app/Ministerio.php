<?php namespace App;

use App\Services\Saneador;
use Illuminate\Database\Eloquent\Model;

class Ministerio extends Model {

	//
    protected $table = 'ministerios';
    public $timestamps = false;
    public $primaryKey = 'MNT_ID';
    protected $fillable = ['MNT_NOMBRE','MNT_DESCRIPCION','MNT_IMG','MNT_INFORMACION'];

    public function setMntImgAttribute($file){
        $name= $this->sanear_string(utf8_decode($this->MNT_NOMBRE));
        $this->attributes['MNT_IMG'] = 'image_'.str_replace(' ', '',$name).'.jpg';
        $nombre = 'image_'.str_replace(' ', '',$name).'.jpg';
        \Storage::disk('local')->put($nombre, \File::get($file));
    }

    function sanear_string($string)
    {
        $string = trim($string);
        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );
        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );
        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );
        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );
        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        return $string;
    }
}
