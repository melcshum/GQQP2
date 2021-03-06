@extends ('backend.layouts.app')
 
@section ('title',  trans('labels.lms.loopQuestions.management') . ' | ' . trans('labels.lms.loopQuestions.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.lms.loopQuestions.management') }}
        <small>{{ trans('labels.lms.loopQuestions.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($loopQuestion, ['route' => ['lms.loopQuestion.update', $loopQuestion], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'files' => true]) }}


        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.lms.loopQuestions.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('lms.loopQuestion.includes.partials.loopQuestion-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            {{ Form::hidden('id', null) }}

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.lms.loopQuestions.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.loopQuestions.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

              
                <div class="form-group">
                    {{ Form::label('question', trans('validation.attributes.lms.loopQuestions.question'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('tutquestion', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.loopQuestions.question')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('program', trans('validation.attributes.lms.loopQuestions.program'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('program', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.loopQuestions.program')]) }}

                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('question_ans', trans('validation.attributes.lms.loopQuestions.question_ans'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::select('question_ans', array(
                            'a' => 'a',
                            'b' => 'b',
                            'c' => 'c',
                            'd' => 'd',
                            ),
                                null,
                                ['placeholder' => 'select the right answer']
                            )

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
                    {{ Form::label('photo', trans('validation.attributes.lms.loopQuestions.photo'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::file('photo')}}
                    </div><!--col-lg-10-->
                </div><!--form control-->
               
                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.lms.loopQuestions.active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1"> 
                        {{ Form::checkbox('status', '1', $loopQuestion->status) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->
 
             
 
            </div><!-- /.box-body -->
        </div><!--box-->

         <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('lms.loopQuestion.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.edit'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@stop

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
@stop
