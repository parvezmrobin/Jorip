<?php

namespace App\Http\Controllers;

use App\Response;
use App\Question;
use App\Survey;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * CompanyController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $user = \Auth::user();

        foreach ($inputs as $question => $input) {
            if (is_array($input)){
                foreach ($input as $item) {
                    $response = new Response();
                    $response->respondent_id = $user->id;
                    $response->question_id = $question;
                    $response->response = $item;
                    $response->save();
                }
                continue;
            }
            $response = new Response();
            $response->respondent_id = $user->id;
            $response->question_id = $question;
            $response->response = $input;
            $response->save();
        }
        $user->points += Question::find($inputs->keys()->all()[0])->survey->points_per_response;
        return redirect('/home')->with('alert', 'Response Submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
