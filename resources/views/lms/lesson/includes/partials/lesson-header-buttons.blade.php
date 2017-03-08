<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.lesson.index', trans('menus.lms.lessons.all'), [],
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.lesson.create', trans('menus.lms.lessons.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.lesson.deactivated', trans('menus.lms.lessons.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.lesson.deleted', trans('menus.lms.lessons.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.lms.lessons.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.lesson.index', trans('menus.lms.lessons.all')) }}</li>
            <li>{{ link_to_route('lms.lesson.create', trans('menus.lms.lessons.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.lesson.deactivated', trans('menus.lms.lessons.deactivated')) }}</li>
            <li>{{ link_to_route('lms.lesson.deleted', trans('menus.lms.lessons.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>