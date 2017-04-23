<?php

Breadcrumbs::register('lms.arrayQuestion.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.arrayQuestions.management'), route('lms.arrayQuestion.index'));
});

Breadcrumbs::register('lms.arrayQuestion.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.arrayQuestion.index');
    $breadcrumbs->push(trans('menus.lms.arrayQuestions.deactivated'), route('lms.arrayQuestion.deactivated'));
});

Breadcrumbs::register('lms.arrayQuestion.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.arrayQuestion.index');
    $breadcrumbs->push(trans('menus.lms.arrayQuestions.deleted'), route('lms.arrayQuestion.deleted'));
});

Breadcrumbs::register('lms.arrayQuestion.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.arrayQuestion.index');
    $breadcrumbs->push(trans('menus.lms.arrayQuestions.create'), route('lms.arrayQuestion.create'));
});

Breadcrumbs::register('lms.arrayQuestion.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.arrayQuestion.index');
    $breadcrumbs->push(trans('menus.lms.arrayQuestions.view'), route('lms.arrayQuestion.show', $id));
});

Breadcrumbs::register('lms.arrayQuestion.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.arrayQuestion.index');
    $breadcrumbs->push(trans('menus.lms.arrayQuestions.edit'), route('lms.arrayQuestion.edit', $id));
});

Breadcrumbs::register('lms.arrayQuestion.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.arrayQuestion.index');
    $breadcrumbs->push(trans('menus.lms.arrayQuestions.change-password'), route('lms.arrayQuestion.change-password', $id));
});

?>