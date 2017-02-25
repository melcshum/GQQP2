<?php

Breadcrumbs::register('lms.module.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.modules.management'), route('lms.module.index'));
});

Breadcrumbs::register('lms.module.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.module.index');
    $breadcrumbs->push(trans('menus.lms.modules.deactivated'), route('lms.module.deactivated'));
});

Breadcrumbs::register('lms.module.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.module.index');
    $breadcrumbs->push(trans('menus.lms.modules.deleted'), route('lms.module.deleted'));
});

Breadcrumbs::register('lms.module.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.module.index');
    $breadcrumbs->push(trans('menus.lms.modules.create'), route('lms.module.create'));
});

Breadcrumbs::register('lms.module.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.module.index');
    $breadcrumbs->push(trans('menus.lms.modules.view'), route('lms.module.show', $id));
});

Breadcrumbs::register('lms.module.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.module.index');
    $breadcrumbs->push(trans('menus.lms.modules.edit'), route('lms.module.edit', $id));
});

Breadcrumbs::register('lms.module.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.module.index');
    $breadcrumbs->push(trans('menus.lms.modules.change-password'), route('lms.module.change-password', $id));
});
