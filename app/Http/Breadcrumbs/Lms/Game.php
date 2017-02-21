<?php

Breadcrumbs::register('lms.game.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('labels.lms.games.management'), route('lms.game.index'));
});

Breadcrumbs::register('lms.game.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.game.index');
    $breadcrumbs->push(trans('menus.lms.games.deactivated'), route('lms.game.deactivated'));
});

Breadcrumbs::register('lms.game.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.game.index');
    $breadcrumbs->push(trans('menus.lms.games.deleted'), route('lms.game.deleted'));
});

Breadcrumbs::register('lms.game.create', function ($breadcrumbs) {
    $breadcrumbs->parent('lms.game.index');
    $breadcrumbs->push(trans('menus.lms.games.create'), route('lms.game.create'));
});

Breadcrumbs::register('lms.game.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.game.index');
    $breadcrumbs->push(trans('menus.lms.games.view'), route('lms.game.show', $id));
});

Breadcrumbs::register('lms.game.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.game.index');
    $breadcrumbs->push(trans('menus.lms.games.edit'), route('lms.game.edit', $id));
});

Breadcrumbs::register('lms.game.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('lms.game.index');
    $breadcrumbs->push(trans('menus.lms.games.change-password'), route('lms.game.change-password', $id));
});
