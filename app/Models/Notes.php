<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    //---------- Relation Matiere_Students ---------//
    public function Students()
    {
        return $this->HasMany(Student::class);
    }
    //---------- Relation Matiere_Cours ---------//
    public function Matiere()
    {
        return $this->HasMany(Exercices::class);
    }
}
