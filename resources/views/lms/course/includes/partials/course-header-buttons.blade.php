<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.course.index', trans('menus.lms.courses.all'), [], 
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.course.create', trans('menus.lms.courses.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.course.deactivated', trans('menus.lms.courses.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.course.deleted', trans('menus.lms.courses.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.course.index', trans('menus.lms.courses.users.all')) }}</li>
            <li>{{ link_to_route('lms.course.create', trans('menus.lms.courses.users.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.course.deactivated', trans('menus..lms.courses.deactivated')) }}</li>
            <li>{{ link_to_route('lms.course.deleted', trans('menus.lms.courses.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>