<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.iftutorialQuestion.index', trans('menus.lms.iftutorialQuestions.all'), [],
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.iftutorialQuestion.create', trans('menus.lms.iftutorialQuestions.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.iftutorialQuestion.deactivated', trans('menus.lms.iftutorialQuestions.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.iftutorialQuestion.deleted', trans('menus.lms.iftutorialQuestions.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.lms.iftutorialQuestions.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.iftutorialQuestion.index', trans('menus.lms.iftutorialQuestions.all')) }}</li>
            <li>{{ link_to_route('lms.iftutorialQuestion.create', trans('menus.lms.iftutorialQuestions.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.iftutorialQuestion.deactivated', trans('menus.lms.iftutorialQuestions.deactivated')) }}</li>
            <li>{{ link_to_route('lms.iftutorialQuestion.deleted', trans('menus.lms.iftutorialQuestions.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>