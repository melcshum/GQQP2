@extends ('backend.layouts.app')

@section ('title',  trans('labels.lms.models.management') . ' | ' . trans('labels.lms.models.create'))

@section('page-header')
    <h1>
        {{ trans('labels.lms.models.management') }}
        <small>{{ trans('labels.lms.models.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'lms.model.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.lms.models.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('lms.model.includes.partials.model-header-buttons')
                          </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', trans('validation.attributes.lms.models.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.models.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('description', trans('validation.attributes.lms.models.description'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.models.description')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('slug', trans('validation.attributes.lms.models.slug'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.lms.models.slug')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
 
               
                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.lms.models.active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('status', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->
 
             

              
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('lms.model.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
