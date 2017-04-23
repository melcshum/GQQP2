<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.arrayQuestion.index', trans('menus.lms.arrayQuestions.all'), [],
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.arrayQuestion.create', trans('menus.lms.arrayQuestions.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.arrayQuestion.deactivated', trans('menus.lms.arrayQuestions.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.arrayQuestion.deleted', trans('menus.lms.arrayQuestions.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.lms.arrayQuestions.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.arrayQuestion.index', trans('menus.lms.arrayQuestions.all')) }}</li>
            <li>{{ link_to_route('lms.arrayQuestion.create', trans('menus.lms.arrayQuestions.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.arrayQuestion.deactivated', trans('menus.lms.arrayQuestions.deactivated')) }}</li>
            <li>{{ link_to_route('lms.arrayQuestion.deleted', trans('menus.lms.arrayQuestions.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>