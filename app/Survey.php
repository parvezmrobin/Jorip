<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function scopeActive($query)
    {
        return $query
            ->whereRaw('total_points > points_per_response *
                (SELECT count(DISTINCT respondent_id)
                FROM surveys as s
                INNER JOIN questions ON questions.survey_id = s.id
                INNER JOIN responses ON responses.question_id = questions.id
                WHERE s.id = surveys.id)');

    }

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function company() {
        return $this->belongsTo('App\Company');
    }
}
