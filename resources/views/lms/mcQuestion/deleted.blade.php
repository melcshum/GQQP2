@extends ('backend.layouts.app')

@section ('title',  trans('labels.lms.mcQuestions.management') . ' | ' . trans('labels.lms.mcQuestions.deleted'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.lms.mcQuestions.management') }}
        <small>{{ trans('labels.lms.mcQuestions.deleted') }} </small>
    </h1>
@endsection


@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.lms.mcQuestions.deleted') }}</h3>

            <div class="box-tools pull-right">
                @include('lms.mcQuestion.includes.partials.mcQuestion-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

       <div class="box-body">
            <div class="table-responsive">
                <table id="mcQuestions-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.lms.mcQuestions.table.id') }}</th>
                            <th>{{ trans('labels.lms.mcQuestions.table.name') }}</th>
                            {{--<th>{{ trans('labels.lms.questions.table.description') }}</th>--}}
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
            $('#mcQuestions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("lms.mcQuestion.get") }}',
                    type: 'post',
                    data: {status: false, trashed: true}
                },
                columns: [
                    {data: 'id', name: '{{config('lms.mcQuestions_table')}}.id'},
                    {data: 'name', name: '{{config('lms.mcQuestions_table')}}.name', render: $.fn.dataTable.render.text()},
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

            $("body").on("click", "a[name='delete_mcQuestion_perm']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");
                swal({
                    title: "{{ trans('strings.backend.general.are_you_sure') }}",
                    text: "{{ trans('strings.lms.mcQuestions.delete_mcQuestion_confirm') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('strings.backend.general.continue') }}",
                    cancelButtonText: "{{ trans('buttons.general.cancel') }}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location.href = linkURL;
                    }
                });
            });

            $("body").on("click", "a[name='restore_mcQuestion']", function(e) {
                e.preventDefault();
                var linkURL = $(this).attr("href");
                swal({
                    title: "{{ trans('strings.backend.general.are_you_sure') }}",
                    text: "{{ trans('strings.lms.mcQuestions.restore_mcQuestion_confirm') }}",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "{{ trans('strings.backend.general.continue') }}",
                    cancelButtonText: "{{ trans('buttons.general.cancel') }}",
                    closeOnConfirm: false
                }, function(isConfirmed){
                    if (isConfirmed){
                        window.location.href = linkURL;
                    }
                });
            });
		});
	</script>
@stop
