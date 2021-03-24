<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    //---------- Relation Cours_Teachers ---------//
    public function Teachers()
    {
        return $this->HasMany(Teacher::class);
    }
    //---------- Relation Cours_Students ---------//
    public function Students()
    {
        return $this->HasMany(Student::class);
    }
    //---------- Relation Cours_Matieres ---------//
    public function matiere()
    {
        return $this->BelongsTo(Matieres::class);
    }
    //---------- Relation Cours_Exercices ---------//
    public function Exercices()
    {
        return $this->HasMany(Exercices::class);
    }
    //---------- Relation Cours_Classes ---------//
    public function Classes()
    {
        return $this->HasMany(Classes::class);
    }
}
