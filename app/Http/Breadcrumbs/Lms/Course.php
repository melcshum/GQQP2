<?php

Breadcrumbs::register('lms.course.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.courses.management'), route('lms.course.index'));
});

Breadcrumbs::register('lms.course.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.course.index');
    $breadcrumbs->push(trans('menus.lms.courses.deactivated'), route('lms.course.deactivated'));
});

Breadcrumbs::register('lms.course.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.course.index');
    $breadcrumbs->push(trans('menus.lms.courses.deleted'), route('lms.course.deleted'));
});

Breadcrumbs::register('lms.course.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.course.index');
    $breadcrumbs->push(trans('menus.lms.courses.create'), route('lms.course.create'));
});

Breadcrumbs::register('lms.course.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.course.index');
    $breadcrumbs->push(trans('menus.lms.courses.view'), route('lms.course.show', $id));
});

Breadcrumbs::register('lms.course.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.course.index');
    $breadcrumbs->push(trans('menus.lms.courses.edit'), route('lms.course.edit', $id));
});

Breadcrumbs::register('lms.course.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.course.index');
    $breadcrumbs->push(trans('menus.lms.coursess.change-password'), route('lms.course.change-password', $id));
});
