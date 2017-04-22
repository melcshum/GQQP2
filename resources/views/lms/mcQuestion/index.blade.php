@extends ('lms.layouts.app')

@section ('title', trans('labels.lms.mcQuestions.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.lms.mcQuestions.management') }}
        <small>{{ trans('labels.lms.mcQuestions.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.lms.mcQuestions.active') }}</h3>

            <div class="box-tools pull-right">
                @include('lms.mcQuestion.includes.partials.mcQuestion-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
    </div><!--box-->

        <div class="box-body">
            <div class="table-responsive">
                <table id="mcQuestions-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.lms.mcQuestions.table.id') }}</th>
                            <th>{{ trans('labels.lms.mcQuestions.table.name') }}</th>
                            <th>{{ trans('labels.lms.mcQuestions.table.question') }}</th>
                            {{--<th>{{ trans('labels.lms.questions.table.games') }}</th>--}}
                            {{--<th>{{ trans('labels.lms.questions.table.description') }}</th>--}}
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.lms.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('mcQuestion') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#mcQuestions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("lms.mcQuestion.get") }}',
                    type: 'post',
                    data: {status: 1, trashed: false}
                },
                columns: [
                    
                     {data: 'id', name: '{{config('lms.mcQuestions_table')}}.id'},
                     {data: 'name', name: '{{config('lms.mcQuestions_table')}}.name', render: $.fn.dataTable.render.text()},
                     {data: 'question', name: '{{config('lms.mcQuestions_table')}}.question', render: $.fn.dataTable.render.text()},
                     {{--{data: 'games', name: '{{config('lms.games_table')}}.name', sortable: false},--}}
                     {{--{data: 'description', name: '{{config('lms.questions_table')}}.description', render: $.fn.dataTable.render.text()},--}}
 
//                    {data: 'confirmed', name: '{{config('access.users_table')}}.confirmed'},
//                    {data: 'roles', name: '{{config('access.roles_table')}}.name', sortable: false},
//                    {data: 'created_at', name: '{{config('access.users_table')}}.created_at'},
//                    {data: 'updated_at', name: '{{config('access.users_table')}}.updated_at'},
                      {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop
