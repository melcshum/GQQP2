<?php

Breadcrumbs::register('lms.model.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.models.management'), route('lms.model.index'));
});

Breadcrumbs::register('lms.model.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.model.index');
    $breadcrumbs->push(trans('menus.lms.models.deactivated'), route('lms.model.deactivated'));
});

Breadcrumbs::register('lms.model.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.model.index');
    $breadcrumbs->push(trans('menus.lms.models.deleted'), route('lms.model.deleted'));
});

Breadcrumbs::register('lms.model.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.model.index');
    $breadcrumbs->push(trans('menus.lms.models.create'), route('lms.model.create'));
});

Breadcrumbs::register('lms.model.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.model.index');
    $breadcrumbs->push(trans('menus.lms.models.view'), route('lms.model.show', $id));
});

Breadcrumbs::register('lms.model.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.model.index');
    $breadcrumbs->push(trans('menus.lms.models.edit'), route('lms.model.edit', $id));
});

Breadcrumbs::register('lms.model.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.model.index');
    $breadcrumbs->push(trans('menus.lms.models.change-password'), route('lms.model.change-password', $id));
});

?>