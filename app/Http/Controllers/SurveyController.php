<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;
use App\Question;
use App\McOption;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::where('company_id', \Auth::id())->get();
        foreach ($surveys as $survey) {
            $survey->num_response = \DB::table('questions')
                ->join('responses', 'question_id', 'questions.id')
                ->where('questions.survey_id', $survey->id)
                ->select(\DB::raw('count(DISTINCT respondent_id)'))
                ->get()->first();
        }
        return view('survey_list')->with('surveys', $surveys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $survey = new Survey();
        $survey->title = $request->input('title');
        $survey->description = $request->input('description');
        $survey->company_id = $request->input('user_id');
        $survey->points_per_response = $request->input('ppr');
        $survey->total_points = $request->input('tp');
        $survey->save();


        $questions = $request->input('questions');

        foreach ($questions as $ques) {
            $question = new Question();
            $question->type_id = $ques['type'];
            $question->survey_id = $survey->id;

            $question->title = $ques['title'];
            $question->description = $ques['description'];
            $question->save();

            if ($question->type_id > 2){
                foreach ($ques['options'] as $opt) {
                    $option = new McOption();
                    $option->question_id = $question->id;
                    $option->option = $opt;
                    $option->save();
                }
            }
        }

        return $survey->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Survey $survey)
    {
        return view('answer')->with('survey', $survey);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
    }
}
