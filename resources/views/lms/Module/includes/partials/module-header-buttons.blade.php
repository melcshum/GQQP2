<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.module.index', trans('menus.lms.modules.all'), [],
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.module.create', trans('menus.lms.modules.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.module.deactivated', trans('menus.lms.modules.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.module.deleted', trans('menus.lms.modules.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.lms.modules.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.module.index', trans('menus.lms.modules.all')) }}</li>
            <li>{{ link_to_route('lms.module.create', trans('menus.lms.modules.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.module.deactivated', trans('menus.lms.modules.deactivated')) }}</li>
            <li>{{ link_to_route('lms.module.deleted', trans('menus.lms.modules.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>