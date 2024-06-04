<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alumno extends Model
{
    use HasFactory;

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

    public function nombres_ccee()
    {
        $nombres = Nota::where('alumno_id', $this->id)->get();
        $nombres_ccee = '';
        foreach ($nombres as $n) {
            $nombre = $n->ccee_id;

            $al = Ccee::find($nombre);
            $nombres_ccee .= '<li>' . $al->ce . '</li>';
        }
        return $nombres_ccee ? '<ul>' . $nombres_ccee . '</ul>' : 'Sin criterios';
    }

    public function nombres_nota()
    {
        $nombres = Nota::where('alumno_id', $this->id)->get();
        $nombres_ccee = '';
        foreach ($nombres as $n) {
            $nombre = $n->ccee_id;

            $al = Ccee::find($nombre);
            $nombres_ccee .= '<li>' . $al->ce . '---> nota :' . $n->nota . '</li>';
        }
        return $nombres_ccee ? '<ul>' . $nombres_ccee . '</ul>' : 'Sin criterios';
    }



    public function calificacion_final()
    {

        $notas = Nota::where('alumno_id', $this->id)->get();
        if ($notas->isEmpty()) {
            return 'Sin calificar';
        }
        $calculo = $notas->avg('nota');
        return round($calculo, 2);
    }
}
