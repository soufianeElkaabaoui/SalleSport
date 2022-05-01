<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function salles($selectedDate)
    {
        return $this->belongsToMany(Salle::class, 'Plannings', 'idUser', 'idSalle')->as('plannings')->withPivot('date_seance', 'start_time', 'end_time')->wherePivot('date_seance', $selectedDate);
    }
    public function coures($selectedDate)
    {
        // return $this->belongsToMany(Cour::class, 'Plannings', 'idUser', 'idCour')->as('plannings')->withPivot('date_seance', 'start_time', 'end_time'); // without conditions
        return $this->belongsToMany(Cour::class, 'Plannings', 'idUser', 'idCour')
                        ->as('plannings')
                        ->withPivot('date_seance', 'start_time', 'end_time')
                        ->wherePivot('date_seance', $selectedDate); // with conditions
    }
}
