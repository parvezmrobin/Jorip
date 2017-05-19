<?php

use Illuminate\Database\Seeder;
use App\Survey;
use Carbon\Carbon;
class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surveys = Survey::all();
        $respondents = \App\Respondent::all();
        $faker = Faker\Factory::create();

        foreach ($surveys as $survey) {
            $questions = $survey->questions;
            foreach ($respondents as $respondent) {
                foreach ($questions as $question) {
                    $response = [
                        'respondent_id' => $respondent->id,
                        'question_id' => $question->id,
                        'created_at' => new Carbon,
                        'updated_at' => new Carbon,
                    ];

                    if ($question->type->id > 2){
                        $response['response'] = rand(1, 4);
                    } else {
                        $response['response'] = $faker->sentence;
                    }

                    DB::table('responses')->insert($response);
                }
            }
        }
    }
}
