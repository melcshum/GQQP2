@extends ('backend.layouts.app')

@section ('title',  trans('labels.lms.arrayQuestions.management') . ' | ' . trans('labels.lms.arrayQuestions.create'))

@section('page-header')
    <h1>
        {{ trans('labels.lms.arrayQuestions.management') }}
        <small>{{ trans('labels.lms.arrayQuestions.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'lms.arrayQuestion.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.lms.arrayQuestions.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('lms.arrayQuestion.includes.partials.arrayQuestion-header-buttons')
                          </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.lms.arrayQuestions.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.arrayQuestions.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('question_type', trans('validation.attributes.lms.arrayQuestions.question_type'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('question_type', array(

                            'array'   => 'array',

                            ),
                                null,
                                ['placeholder' => 'select the question topic']
                            )
                        }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('question_level', trans('validation.attributes.lms.arrayQuestions.question_level'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{
                            Form::select('tutquestion_level',array(
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                            ),
                                null,
                                ['placeholder' => 'select the question level'])
                        }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('question', trans('validation.attributes.lms.arrayQuestions.question'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('tutquestion', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.arrayQuestions.question')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->


                <div class="form-group">
                    {{ Form::label('program', trans('validation.attributes.lms.arrayQuestions.program'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('program', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.arrayQuestions.program')]) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('question_ans', trans('validation.attributes.lms.arrayQuestions.question_ans'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('question_ans', array(
                            'a' => 'a',
                            'b' => 'b',
                            'c' => 'c',
                            'd' => 'd',
                            ),
                                null,
                                ['placeholder' => 'select the right answer'])
                        }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('mc_ans1', trans('validation.attributes.lms.arrayQuestions.mc_ans1'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('mc_ans1', null, ['size' => '18x4']) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('mc_ans2', trans('validation.attributes.lms.arrayQuestions.mc_ans2'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('mc_ans2', null, ['size' => '18x4']) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('mc_ans3', trans('validation.attributes.lms.arrayQuestions.mc_ans3'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('mc_ans3', null, ['size' => '18x4']) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('mc_ans4', trans('validation.attributes.lms.arrayQuestions.mc_ans4'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('mc_ans4', null, ['size' => '18x4']) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->



                <div class="form-group">
                    {{ Form::label('photo', trans('validation.attributes.lms.arrayQuestions.photo'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::file('photo')}}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('slug', trans('validation.attributes.lms.arrayQuestions.slug'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.arrayQuestions.slug')])}}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.lms.arrayQuestions.active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('status', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->
 
             

              
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('lms.arrayQuestion.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
@stop
