@extends ('backend.layouts.app')

@section ('title',  trans('labels.lms.mcQuestions.management') . ' | ' . trans('labels.lms.mcQuestions.create'))

@section('page-header')
    <h1>
        {{ trans('labels.lms.mcQuestions.management') }}
        <small>{{ trans('labels.lms.mcQuestions.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'lms.mcQuestion.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true]) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.lms.mcQuestions.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('lms.mcQuestion.includes.partials.mcQuestion-header-buttons')
                          </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.lms.mcQuestions.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.mcQuestions.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('question_type', trans('validation.attributes.lms.mcQuestions.question_type'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('question_type', array(
                            'if_else' => 'if_else',
                            'array'   => 'array',
                            'loop'    => 'loop',
                            ),
                                null,
                                ['placeholder' => 'select the question topic']
                            )
                        }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('question_level', trans('validation.attributes.lms.mcQuestions.question_level'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{
                            Form::select('question_level',array(
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
                    {{ Form::label('question', trans('validation.attributes.lms.mcQuestions.question'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('question', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.mcQuestions.question')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->


                <div class="form-group">
                    {{ Form::label('program', trans('validation.attributes.lms.mcQuestions.program'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('program', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.mcQuestions.program')]) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('question_ans', trans('validation.attributes.lms.mcQuestions.question_ans'), ['class' => 'col-lg-2 control-label']) }}

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
                    {{ Form::label('mc_ans1', trans('validation.attributes.lms.mcQuestions.mc_ans1'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('mc_ans1', null, ['size' => '18x4']) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('mc_ans2', trans('validation.attributes.lms.mcQuestions.mc_ans2'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('mc_ans2', null, ['size' => '18x4']) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('mc_ans3', trans('validation.attributes.lms.mcQuestions.mc_ans3'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('mc_ans3', null, ['size' => '18x4']) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('mc_ans4', trans('validation.attributes.lms.mcQuestions.mc_ans4'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('mc_ans4', null, ['size' => '18x4']) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('knowledge', trans('validation.attributes.lms.mcQuestions.knowledge'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::number('knowledge') }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('gold', trans('validation.attributes.lms.mcQuestions.gold'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::number('gold') }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('time', trans('validation.attributes.lms.mcQuestions.time'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::number('time') }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('hint', trans('validation.attributes.lms.mcQuestions.hint'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('hint', null, ['size'=> '27x8']) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('photo', trans('validation.attributes.lms.mcQuestions.photo'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::file('photo')}}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('slug', trans('validation.attributes.lms.mcQuestions.slug'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.mcQuestions.slug')])}}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.lms.mcQuestions.active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('status', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->
 
             

              
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('lms.mcQuestion.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
