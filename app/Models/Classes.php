<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    //---------- Relation Classes_Teachers ---------//
    public function Teachers()
    {
        return $this->HasMany(Teacher::class);
    }
    //---------- Relation Classes_Students ---------//
//    public function Students()
//    {
//        return $this->HasMany(Student::class);
//    }
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    //---------- Relation Classes_Matieres ---------//
    public function Matiere()
    {
        return $this->HasMany(Matieres::class);
    }

    //---------- Relation Classes_Exercices ---------//
    public function Exercices()
    {
        return $this->HasMany(Exercices::class);
    }
    //---------- Relation Classes_Cours ---------//
    public function Cours()
    {
        return $this->HasMany(Exercices::class);
    }
}
