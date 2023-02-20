<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function voyage(){
        return $this->belongsTo(voyage::class);
    }

    public function ville_a(){
        return $this->belongsTo(ville::class);
    }

    public function ville_d(){
        return $this->belongsTo(ville::class);
    }

}
