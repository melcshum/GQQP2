@extends ('backend.layouts.app')

@section ('title',  trans('labels.lms.loopQuestions.management') . ' | ' . trans('labels.lms.loopQuestions.deactivated'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.lms.loopQuestions.management') }}
        <small>{{ trans('labels.lms.loopQuestions.deactivated') }} </small>
    </h1>
@endsection


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.lms.loopQuestions.deactivated') }}</h3>

            <div class="box-tools pull-right">
                @include('lms.loopQuestion.includes.partials.loopQuestion-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

           <div class="box-body">
            <div class="table-responsive">
                <table id="loopQuestions-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.lms.loopQuestions.table.id') }}</th>
                            <th>{{ trans('labels.lms.loopQuestions.table.name') }}</th>
                            {{--<th>{{ trans('labels.lms.loopQuestions.table.description') }}</th>--}}
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#loopQuestions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("lms.loopQuestion.get") }}',
                    type: 'post',
                    data: {status: 0, trashed: false}
                },
                columns: [
                   {data: 'id', name: '{{config('lms.loopQuestions_table')}}.id'},
                     {data: 'name', name: '{{config('lms.loopQuestions_table')}}.name', render: $.fn.dataTable.render.text()},
                     {{--{data: 'description', name: '{{config('lms.loopQuestions_table')}}.description', render: $.fn.dataTable.render.text()},--}}
 {{----}}
{{--//                    {data: 'confirmed', name: '{{config('access.users_table')}}.confirmed'},--}}
{{--//                    {data: 'roles', name: '{{config('access.roles_table')}}.name', sortable: false},--}}
{{--//                    {data: 'created_at', name: '{{config('access.users_table')}}.created_at'},--}}
{{--//                    {data: 'updated_at', name: '{{config('access.users_table')}}.updated_at'},--}}
                      {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop
