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

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
    $trail->push('Edit User', route('users.edit', $user));
});

Breadcrumbs::for('users.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Deleted Users', route('users.trash'));
});

Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
    $trail->push('Role & Permissions', route('roles.index'));
});

Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
    $trail->push('Role & Permissions', route('roles.index'));
    $trail->push('Create Role', route('roles.create'));
});

Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
    $trail->push('Role & Permissions', route('roles.index'));
    $trail->push($role->name, route('roles.edit', $role));
});

Breadcrumbs::for('faculties.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Faculties', route('faculties.index'));
});

Breadcrumbs::for('faculties.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Faculties', route('faculties.index'));
    $trail->push('Faculties', route('faculties.create'));
});

Breadcrumbs::for('faculties.edit', function (BreadcrumbTrail $trail, $faculty) {
    $trail->parent('dashboard');
    $trail->push('Faculties', route('faculties.index'));
    $trail->push('Faculties', route('faculties.edit', $faculty));
});
