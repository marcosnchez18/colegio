<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ccee extends Model
{
    use HasFactory;

    protected $table = 'ccees';

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
