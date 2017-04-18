<?php

Breadcrumbs::register('lms.mcQuestion.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.mcQuestions.management'), route('lms.mcQuestion.index'));
});

Breadcrumbs::register('lms.mcQuestion.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.mcQuestion.index');
    $breadcrumbs->push(trans('menus.lms.mcQuestions.deactivated'), route('lms.mcQuestion.deactivated'));
});

Breadcrumbs::register('lms.mcQuestion.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.mcQuestion.index');
    $breadcrumbs->push(trans('menus.lms.mcQuestions.deleted'), route('lms.mcQuestion.deleted'));
});

Breadcrumbs::register('lms.mcQuestion.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.mcQuestion.index');
    $breadcrumbs->push(trans('menus.lms.mcQuestions.create'), route('lms.mcQuestion.create'));
});

Breadcrumbs::register('lms.mcQuestion.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.mcQuestion.index');
    $breadcrumbs->push(trans('menus.lms.mcQuestions.view'), route('lms.mcQuestion.show', $id));
});

Breadcrumbs::register('lms.mcQuestion.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.mcQuestion.index');
    $breadcrumbs->push(trans('menus.lms.mcQuestions.edit'), route('lms.mcQuestion.edit', $id));
});

Breadcrumbs::register('lms.mcQuestion.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.mcQuestion.index');
    $breadcrumbs->push(trans('menus.lms.mcQuestions.change-password'), route('lms.mcQuestion.change-password', $id));
});

?>