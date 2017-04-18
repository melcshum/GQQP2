<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.mcQuestion.index', trans('menus.lms.mcQuestions.all'), [],
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.mcQuestion.create', trans('menus.lms.mcQuestions.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.mcQuestion.deactivated', trans('menus.lms.mcQuestions.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.mcQuestion.deleted', trans('menus.lms.mcQuestions.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.lms.mcQuestions.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.mcQuestion.index', trans('menus.lms.mcQuestions.all')) }}</li>
            <li>{{ link_to_route('lms.mcQuestion.create', trans('menus.lms.mcQuestions.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.mcQuestion.deactivated', trans('menus.lms.mcQuestions.deactivated')) }}</li>
            <li>{{ link_to_route('lms.mcQuestion.deleted', trans('menus.lms.mcQuestions.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>