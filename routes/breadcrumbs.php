<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
});

Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
    $trail->push('Create User', route('users.create'));
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
    $trail->push('Edit User', route('users.edit'));
});

Breadcrumbs::for('users.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Deleted Users', route('users.trash'));
});
