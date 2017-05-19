<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function scopeActive($query)
    {
        return $query
            ->join('questions', 'survey_id', 'surveys.id')
            ->join('responses', 'question_id', 'questions.id')
            ->where('total_points', '>',
                'points_per_response * count(DISTINCT respondent_id)')
            ->select('surveys.*');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function company() {
        return $this->belongsTo('App\Company');
    }
}
