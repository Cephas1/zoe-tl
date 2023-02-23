<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function destination_d(){
        return $this->belongsTo(destination::class, 'ville_d');
    }

    public function destination_a(){
        return $this->hasOne(destination::class, 'ville_a');
    }
}
