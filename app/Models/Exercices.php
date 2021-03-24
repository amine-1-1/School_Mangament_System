<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercices extends Model
{
    use HasFactory;
    //---------- Relation Cours_Teachers ---------//
    public function Teacher()
    {
        return $this->belongsto(Teacher::class);
    }
    //---------- Relation Cours_Students ---------//
    public function Students()
    {
        return $this->HasMany(Student::class);
    }
    //---------- Relation Cours_Matieres ---------//
    public function Matiere()
    {
        return $this->BelongsTo(Matieres::class);
    }
    //---------- Relation Cours_Exercices ---------//
    public function Cours()
    {
        return $this->BelongsTo(Exercices::class);
    }
    //---------- Relation Cours_Classes ---------//
    public function Classes()
    {
        return $this->HasMany(Exercices::class);
    }
    public function ExerciceRemis()
    {
        return $this->HasMany(ExerciceRemis::class);
    }

}
