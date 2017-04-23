<?php

Breadcrumbs::register('lms.iftutorialQuestion.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.iftutorialQuestions.management'), route('lms.iftutorialQuestion.index'));
});

Breadcrumbs::register('lms.iftutorialQuestion.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.iftutorialQuestion.index');
    $breadcrumbs->push(trans('menus.lms.iftutorialQuestions.deactivated'), route('lms.iftutorialQuestion.deactivated'));
});

Breadcrumbs::register('lms.iftutorialQuestion.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.iftutorialQuestion.index');
    $breadcrumbs->push(trans('menus.lms.iftutorialQuestions.deleted'), route('lms.iftutorialQuestion.deleted'));
});

Breadcrumbs::register('lms.iftutorialQuestion.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.iftutorialQuestion.index');
    $breadcrumbs->push(trans('menus.lms.iftutorialQuestions.create'), route('lms.iftutorialQuestion.create'));
});

Breadcrumbs::register('lms.iftutorialQuestion.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.iftutorialQuestion.index');
    $breadcrumbs->push(trans('menus.lms.iftutorialQuestions.view'), route('lms.iftutorialQuestion.show', $id));
});

Breadcrumbs::register('lms.iftutorialQuestion.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.iftutorialQuestion.index');
    $breadcrumbs->push(trans('menus.lms.iftutorialQuestions.edit'), route('lms.iftutorialQuestion.edit', $id));
});

Breadcrumbs::register('lms.iftutorialQuestion.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.iftutorialQuestion.index');
    $breadcrumbs->push(trans('menus.lms.iftutorialQuestions.change-password'), route('lms.iftutorialQuestion.change-password', $id));
});

?>