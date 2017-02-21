<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.model.index', trans('menus.lms.models.all'), [],
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.model.create', trans('menus.lms.models.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.model.deactivated', trans('menus.lms.models.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.model.deleted', trans('menus.lms.models.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.lms.models.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.model.index', trans('menus.lms.models.all')) }}</li>
            <li>{{ link_to_route('lms.model.create', trans('menus.lms.models.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.model.deactivated', trans('menus.lms.models.deactivated')) }}</li>
            <li>{{ link_to_route('lms.model.deleted', trans('menus.lms.models.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>