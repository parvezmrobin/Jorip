<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
