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
    $trail->push('Create Faculty', route('faculties.create'));
});

Breadcrumbs::for('faculties.edit', function (BreadcrumbTrail $trail, $faculty) {
    $trail->parent('dashboard');
    $trail->push('Faculties', route('faculties.index'));
    $trail->push('Edit Faculty', route('faculties.edit', $faculty));
});

Breadcrumbs::for('designations.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Designations', route('designations.index'));
});

Breadcrumbs::for('designations.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Designations', route('designations.index'));
    $trail->push('Create Designation', route('designations.create'));
});

Breadcrumbs::for('designations.edit', function (BreadcrumbTrail $trail, $designation) {
    $trail->parent('dashboard');
    $trail->push('Designations', route('designations.index'));
    $trail->push('Edit Designation', route('designations.edit', $designation));
});

Breadcrumbs::for('downloads.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Downloads', route('downloads.index'));
});

Breadcrumbs::for('principal-investigators.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Upload New Research Proposal', route('principal-investigators.create'));
});

Breadcrumbs::for('principal-investigators.index', function (BreadcrumbTrail $trail) {

    if (request()->status == 'Pending') {
        $title = 'New Applications';
    } elseif (request()->status == 'Approved') {
        $title = 'Approved Applications';
    } else {
        $title = 'Rejected Applications';
    }

    $trail->parent('dashboard');
    $trail->push($title, route('principal-investigators.index'));
});

Breadcrumbs::for('principal-investigators.dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Research Proposal Overview', route('principal-investigators.dashboard'));
});

// TODO: create breadcrumbs for principal investigator detail page.
//Breadcrumbs::for('principal-investigators.show', function (BreadcrumbTrail $trail, $principalInvestigator) {
//    $trail->parent('dashboard');
//    $trail->push(parse_url(url()->previous())['query'], route('principal-investigators.index'));
//    $trail->push($principalInvestigator->fullname);
//});

Breadcrumbs::for('monthly-progress.index', function (BreadcrumbTrail $trail, $principal_investigator) {
    $trail->parent('dashboard');
    $trail->push('Research Proposal Overview', route('principal-investigators.dashboard'));
    $trail->push('Monthly Progress', route('monthly-progress.index', $principal_investigator));
});

Breadcrumbs::for('monthly-progress.create', function (BreadcrumbTrail $trail, $principal_investigator) {
    $trail->parent('dashboard');
    $trail->push('Research Proposal Overview', route('principal-investigators.dashboard'));
    $trail->push('Monthly Progress', route('monthly-progress.index', $principal_investigator));
    $trail->push('Create Monthly Progress', route('monthly-progress.create', $principal_investigator));
});

Breadcrumbs::for('monthly-progress.show', function (BreadcrumbTrail $trail, $monthlyProgress) {
    $trail->parent('dashboard');
    $trail->push('Research Proposal Overview', route('principal-investigators.dashboard'));
    $trail->push('Monthly Progress', route('monthly-progress.index', $monthlyProgress->principal_investigator_id));
    $trail->push($monthlyProgress->current_progress_month.' Progress', route('monthly-progress.show', [$monthlyProgress->principal_investigator_id, $monthlyProgress]));
});

Breadcrumbs::for('reports.principal-investigator', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Generate Principal Investigator Reports', route('reports.principal-investigator'));
});

Breadcrumbs::for('reports.financial', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Generate Financial Reports', route('reports.financial'));
});
