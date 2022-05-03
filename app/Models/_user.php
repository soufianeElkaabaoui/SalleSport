<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class _user extends Model
{
    use HasFactory;

    protected $fillable =['nom','prenom','email','type','image'];
    public function salles($selectedDate)
    {
        return $this->belongsToMany(_salle::class, '_plannings', 'idUser', 'idSalle')->as('plannings')->withPivot('date_seance', 'start_time', 'end_time')->wherePivot('date_seance', $selectedDate);
    }
    public function coures($selectedDate)
    {
        // return $this->belongsToMany(_coure::class, '_plannings', 'idUser', 'idCour')->as('plannings')->withPivot('date_seance', 'start_time', 'end_time'); // without conditions
        return $this->belongsToMany(_coure::class, '_plannings', 'idUser', 'idCour')
                        ->as('plannings')
                        ->withPivot('date_seance', 'start_time', 'end_time')
                        ->wherePivot('date_seance', $selectedDate); // with conditions
    }
}
