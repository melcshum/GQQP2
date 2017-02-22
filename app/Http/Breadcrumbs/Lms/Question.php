<?php

Breadcrumbs::register('lms.question.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.questions.management'), route('lms.question.index'));
});

Breadcrumbs::register('lms.question.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.question.index');
    $breadcrumbs->push(trans('menus.lms.questions.deactivated'), route('lms.question.deactivated'));
});

Breadcrumbs::register('lms.question.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.question.index');
    $breadcrumbs->push(trans('menus.lms.questions.deleted'), route('lms.question.deleted'));
});

Breadcrumbs::register('lms.question.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.question.index');
    $breadcrumbs->push(trans('menus.lms.questions.create'), route('lms.question.create'));
});

Breadcrumbs::register('lms.question.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.question.index');
    $breadcrumbs->push(trans('menus.lms.questions.view'), route('lms.question.show', $id));
});

Breadcrumbs::register('lms.question.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.question.index');
    $breadcrumbs->push(trans('menus.lms.questions.edit'), route('lms.question.edit', $id));
});

Breadcrumbs::register('lms.question.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.question.index');
    $breadcrumbs->push(trans('menus.lms.questions.change-password'), route('lms.question.change-password', $id));
});

?>