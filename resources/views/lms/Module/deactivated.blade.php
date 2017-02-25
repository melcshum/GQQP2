@extends ('backend.layouts.app')

@section ('title',  trans('labels.lms.modules.management') . ' | ' . trans('labels.lms.modules.deactivated'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.lms.modules.management') }}
        <small>{{ trans('labels.lms.modules.deactivated') }} </small>
    </h1>
@endsection


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.lms.modules.deactivated') }}</h3>

            <div class="box-tools pull-right">
                @include('lms.module.includes.partials.module-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

           <div class="box-body">
            <div class="table-responsive">
                <table id="modules-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.lms.modules.table.id') }}</th>
                            <th>{{ trans('labels.lms.modules.table.name') }}</th>
                            <th>{{ trans('labels.lms.modules.table.description') }}</th>
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
            $('#modules-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("lms.module.get") }}',
                    type: 'post',
                    data: {status: 0, trashed: false}
                },
                columns: [
                   {data: 'id', name: '{{config('lms.modules_table')}}.id'},
                     {data: 'name', name: '{{config('lms.modules_table')}}.name', render: $.fn.dataTable.render.text()},
                     {data: 'description', name: '{{config('lms.modules_table')}}.description', render: $.fn.dataTable.render.text()},
 
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
