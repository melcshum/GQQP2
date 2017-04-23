<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.fillQuestion.index', trans('menus.lms.fillQuestions.all'), [],
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.fillQuestion.create', trans('menus.lms.fillQuestions.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.fillQuestion.deactivated', trans('menus.lms.fillQuestions.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.fillQuestion.deleted', trans('menus.lms.fillQuestions.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.lms.fillQuestions.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.fillQuestion.index', trans('menus.lms.fillQuestions.all')) }}</li>
            <li>{{ link_to_route('lms.fillQuestion.create', trans('menus.lms.fillQuestions.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.fillQuestion.deactivated', trans('menus.lms.fillQuestions.deactivated')) }}</li>
            <li>{{ link_to_route('lms.fillQuestion.deleted', trans('menus.lms.fillQuestions.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>