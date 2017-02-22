<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.question.index', trans('menus.lms.questions.all'), [],
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.question.create', trans('menus.lms.questions.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.question.deactivated', trans('menus.lms.questions.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.question.deleted', trans('menus.lms.questions.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.lms.questions.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.question.index', trans('menus.lms.questions.all')) }}</li>
            <li>{{ link_to_route('lms.question.create', trans('menus.lms.questions.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.question.deactivated', trans('menus.lms.questions.deactivated')) }}</li>
            <li>{{ link_to_route('lms.question.deleted', trans('menus.lms.questions.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>