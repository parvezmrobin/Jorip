<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public function respondent(){
        return $this->belongsTo(Respondent::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
