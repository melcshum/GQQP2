<?php

Breadcrumbs::register('lms.fillQuestion.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.fillQuestions.management'), route('lms.fillQuestion.index'));
});

Breadcrumbs::register('lms.fillQuestion.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.fillQuestion.index');
    $breadcrumbs->push(trans('menus.lms.fillQuestions.deactivated'), route('lms.fillQuestion.deactivated'));
});

Breadcrumbs::register('lms.fillQuestion.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.fillQuestion.index');
    $breadcrumbs->push(trans('menus.lms.fillQuestions.deleted'), route('lms.fillQuestion.deleted'));
});

Breadcrumbs::register('lms.fillQuestion.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.fillQuestion.index');
    $breadcrumbs->push(trans('menus.lms.fillQuestions.create'), route('lms.fillQuestion.create'));
});

Breadcrumbs::register('lms.fillQuestion.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.fillQuestion.index');
    $breadcrumbs->push(trans('menus.lms.fillQuestions.view'), route('lms.fillQuestion.show', $id));
});

Breadcrumbs::register('lms.fillQuestion.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.fillQuestion.index');
    $breadcrumbs->push(trans('menus.lms.fillQuestions.edit'), route('lms.fillQuestion.edit', $id));
});

Breadcrumbs::register('lms.fillQuestion.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.fillQuestion.index');
    $breadcrumbs->push(trans('menus.lms.fillQuestions.change-password'), route('lms.fillQuestion.change-password', $id));
});

?>