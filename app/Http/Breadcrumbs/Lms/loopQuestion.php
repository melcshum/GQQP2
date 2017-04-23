<?php

Breadcrumbs::register('lms.loopQuestion.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.loopQuestions.management'), route('lms.loopQuestion.index'));
});

Breadcrumbs::register('lms.loopQuestion.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.loopQuestion.index');
    $breadcrumbs->push(trans('menus.lms.loopQuestions.deactivated'), route('lms.loopQuestion.deactivated'));
});

Breadcrumbs::register('lms.loopQuestion.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.loopQuestion.index');
    $breadcrumbs->push(trans('menus.lms.loopQuestions.deleted'), route('lms.loopQuestion.deleted'));
});

Breadcrumbs::register('lms.loopQuestion.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.loopQuestion.index');
    $breadcrumbs->push(trans('menus.lms.loopQuestions.create'), route('lms.loopQuestion.create'));
});

Breadcrumbs::register('lms.loopQuestion.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.loopQuestion.index');
    $breadcrumbs->push(trans('menus.lms.loopQuestions.view'), route('lms.loopQuestion.show', $id));
});

Breadcrumbs::register('lms.loopQuestion.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.loopQuestion.index');
    $breadcrumbs->push(trans('menus.lms.loopQuestions.edit'), route('lms.loopQuestion.edit', $id));
});

Breadcrumbs::register('lms.loopQuestion.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.loopQuestion.index');
    $breadcrumbs->push(trans('menus.lms.loopQuestions.change-password'), route('lms.loopQuestion.change-password', $id));
});

?>