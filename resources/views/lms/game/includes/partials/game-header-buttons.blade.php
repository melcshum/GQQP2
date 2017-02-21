<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.game.index', trans('menus.lms.games.all'), [],
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.game.create', trans('menus.lms.games.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.game.deactivated', trans('menus.lms.games.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.game.deleted', trans('menus.lms.games.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.lms.games.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.game.index', trans('menus.lms.games.all')) }}</li>
            <li>{{ link_to_route('lms.game.create', trans('menus.lms.games.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.game.deactivated', trans('menus.lms.games.deactivated')) }}</li>
            <li>{{ link_to_route('lms.game.deleted', trans('menus.lms.games.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>