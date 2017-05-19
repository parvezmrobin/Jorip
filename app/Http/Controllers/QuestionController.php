<?php

namespace App\Http\Controllers;

use App\Question;
use App\Survey;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $survey \App\Survey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Survey $survey)
    {
        return view('individuallist')->with('survey', $survey);
    }

    public function summary(Survey $survey)
    {
        $questions = $survey->questions()->where('type_id', '>', 2)->get();
        foreach ($questions as $question) {
            $question->responses = \DB::table('responses')
                ->join('mc_options', 'responses.response', 'mc_options.id')
                ->where('responses.question_id', $question->id)
                ->groupByRaw('mc_options.id, option')
                ->select(\DB::raw('count(mc_options.id) as response_count, mc_options.id, ms_options.option'))
                ->get();
        }
        return view('summary')->with('questions', $questions)->with('survey', $survey);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('individualdetails')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
