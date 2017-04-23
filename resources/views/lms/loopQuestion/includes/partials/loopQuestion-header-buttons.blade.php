<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('lms.loopQuestion.index', trans('menus.lms.loopQuestions.all'), [],
    ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('lms.loopQuestion.create', trans('menus.lms.loopQuestions.create'), [], ['class' => 'btn btn-success btn-xs']) }}
    {{ link_to_route('lms.loopQuestion.deactivated', trans('menus.lms.loopQuestions.deactivated'), [], ['class' => 'btn btn-warning btn-xs']) }}
    {{ link_to_route('lms.loopQuestion.deleted', trans('menus.lms.loopQuestions.deleted'), [], ['class' => 'btn btn-danger btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.lms.loopQuestions.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('lms.loopQuestion.index', trans('menus.lms.loopQuestions.all')) }}</li>
            <li>{{ link_to_route('lms.loopQuestion.create', trans('menus.lms.loopQuestions.create')) }}</li>
            <li class="divider"></li>
            <li>{{ link_to_route('lms.loopQuestion.deactivated', trans('menus.lms.loopQuestions.deactivated')) }}</li>
            <li>{{ link_to_route('lms.loopQuestion.deleted', trans('menus.lms.loopQuestions.deleted')) }}</li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>