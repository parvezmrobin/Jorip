<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Company;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        $faker = Faker\Factory::create();
        $types = [
            [
                'id' => 1,
                'type' => 'Short Text'
            ],
            [
                'id' => 2,
                'type' => 'Long Text',
            ],
            [
                'id' => 3,
                'type' => 'Multiple Choice',
            ],
            [
                'id' => 4,
                'type' => 'Check Box'
            ]
        ];

        foreach ($types as $type) {
            DB::table('types')->insert($type);
        }

        foreach ($companies as $company) {
            for ($i = 0; $i < 10; $i++){
                $survey = [
                    'company_id' => $company->id,
                    'title' => $faker->sentence,
                    'points_per_response' => rand(5, 10),
                    'total_points' => 100,
                    'description' => $faker->sentence,
                    'created_at' => new Carbon,
                    'updated_at' => new Carbon,
                ];
                $id = DB::table('surveys')->insertGetId($survey);

                for ($j = 0; $j < 5; $j++) {
                    $question = [
                        'survey_id' => $id,
                        'title' => $faker->sentence,
                        'description' => $faker->sentence,
                        'created_at' => new Carbon,
                        'updated_at' => new Carbon,
                    ];
                    if($j < 2){
                        $question['type_id'] = 1;
                    } else if ($j < 3) {
                        $question['type_id'] = 2;
                    } else if($j < 4) {
                        $question['type_id'] = 3;
                    } else {
                        $question['type_id'] = 4;
                    }
                    $quesId = DB::table('questions')->insertGetId($question);

                    if ($j < 4) {
                        for ($k = 0; $k < 4; $k++) {
                            DB::table('mc_options')->insert([
                                'question_id' => $quesId,
                                'option' => $faker->word,
                            ]);
                        }
                    }
                }
            }
        }
    }
}
