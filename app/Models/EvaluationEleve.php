<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationEleve extends Model
{
    protected $fillable = ['evaluation_id', 'eleve_id', 'note'];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function eleve()
    {
        return $this->belongsTo(Eleves::class);
    }
}
