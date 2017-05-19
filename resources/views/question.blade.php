@extends('layouts.app')

@section('content')
    <div class="row" id="vm">
        <div v-show="ppr < 1" class="alert alert-danger">
            Points per response must be more than 0
        </div>
        <div class="form-horizontal">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Title" v-model="title">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Description" v-model="description">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <input type="number" min="1" class="form-control" placeholder="Total Points" v-model.number="tp">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <input type="number" min="1" class="form-control" placeholder="Points Per Response" v-model.number="ppr">
                </div>
            </div>
            <div class="alert alert-info">
                You will get @{{ Math.floor(tp/ppr) }} responses.
            </div>
            <div v-for="(question, key, index) in questions" class="well">
                <div class="form-group" >
                    <div class="col-md-8">
                        <input v-model="question.title" class="form-control" type="text" placeholder="Question Title" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8">
                        <input v-model="question.description" class="form-control" type="text" placeholder="Question Description">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-2" :for="'select'+key">Type</label>
                    <div class="col-xs-10">
                        <select :id="'select'+key" class="form-control" v-model="question.type">
                            <option value="1">Short Text</option>
                            <option value="2">Long Text</option>
                            <option value="3">Multiple Choice</option>
                            <option value="4">Check Box</option>
                        </select>
                    </div>
                </div>
                <div v-if="question.type > 2">
                    <div class="form-group">
                        <div class="col-md-8">
                            <input class="form-control" type="number"
                                   v-model.number="question.option"
                                   placeholder="Number of Options">
                        </div>
                    </div>
                    <div class="col-md-8 form-group" v-for="i in question.option">
                        <input class="form-control" type="text"
                               :placeholder="'Option ' + i"
                               v-model="question.options[i-1]">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8">
                    <button class="btn btn-info" @click="addQuestion">Add Question</button>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-md-8">
                    <button class="btn btn-success btn-block" @click="createSurvey">Create Survey</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        var app = new Vue({
            el: '#vm',
            data: {
                title: '',
                description: '',
                tp: 1,
                ppr: 1,
                questions: [
                    {
                        title: '',
                        description: '',
                        option: 1,
                        options: [],
                        type: 1
                    }
                ]
            },
            methods: {
                addQuestion: function () {
                    this.questions.splice(this.questions.length, 0, {
                        title: '',
                        description: '',
                        option: 1,
                        options: [],
                        type: 1
                    })
                },
                createSurvey: function () {
                    if(this.ppr < 1)
                        return;
                    var data = {
                        questions: this.questions,
                        title: this.title,
                        description: this.description,
                        ppr: this.ppr,
                        tp: this.tp,
                        user_id: {{Auth::id()}}
                    };
//                    axios.post('../survey', data).then(function (resp) {
//                        console.log(resp.data);
//                    });
                    $.post('../api/survey', data, function (data) {
                        open('../home?id=' + data, '_self');
                    });
                }
            }
        })
    </script>
@endsection