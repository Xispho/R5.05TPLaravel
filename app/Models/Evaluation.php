<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['module_id', 'titre', 'date', 'coefficient'];

    public function module()
    {
        return $this->belongsTo(Modules::class);
    }

    public function evaluationEleves()
    {
        return $this->hasMany(EvaluationEleve::class);
    }
}
