<?php

Breadcrumbs::register('lms.lesson.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.lessons.management'), route('lms.lesson.index'));
});

Breadcrumbs::register('lms.lesson.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.lesson.index');
    $breadcrumbs->push(trans('menus.lms.lessons.deactivated'), route('lms.lesson.deactivated'));
});

Breadcrumbs::register('lms.lesson.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.lesson.index');
    $breadcrumbs->push(trans('menus.lms.lessons.deleted'), route('lms.lesson.deleted'));
});

Breadcrumbs::register('lms.lesson.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.lesson.index');
    $breadcrumbs->push(trans('menus.lms.lessons.create'), route('lms.lesson.create'));
});

Breadcrumbs::register('lms.lesson.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.lesson.index');
    $breadcrumbs->push(trans('menus.lms.lessons.view'), route('lms.lesson.show', $id));
});

Breadcrumbs::register('lms.lesson.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.lesson.index');
    $breadcrumbs->push(trans('menus.lms.lessons.edit'), route('lms.lesson.edit', $id));
});

Breadcrumbs::register('lms.lesson.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.lesson.index');
    $breadcrumbs->push(trans('menus.lms.lessons.change-password'), route('lms.lesson.change-password', $id));
});
