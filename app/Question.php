<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function survey(){
        return $this->belongsTo(Survey::class);
    }

    public function Options(){
        return $this->hasMany(McOption::class);
    }

    public function responses(){
        return $this->hasMany(Response::class);
    }
}
