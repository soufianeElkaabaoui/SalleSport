<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class _planning extends Model
{
    use HasFactory;
    protected $fillable = ['date_seance','start_time','end_time','idCour','idSalle','idUser'];
}
