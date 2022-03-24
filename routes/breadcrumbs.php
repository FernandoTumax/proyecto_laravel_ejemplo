<?php

// Home

use App\State;
use App\Town;
use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Inicio', route('home'));
});


// Admin
Breadcrumbs::for('admin', function ($trail) {
    $trail->parent('home');
    $trail->push('Administración', route('administracion'));
});

// Home > Campus

Breadcrumbs::for('campus.index', function($trail){
    $trail->parent('admin');
    $trail->push('Programas/Sedes', route('campus.index'));
});

// Home > Campus > Campu

Breadcrumbs::for('campus.show', function($trail, $campus){
    $trail->parent('campus.index');
    $trail->push("Programa/Sede", route('campus.show', $campus->id));
});

// Home > Campus > Create Campu

Breadcrumbs::for('campus.create', function($trail) {
    $trail->parent('campus.index');
    $trail->push("Crear", route('campus.create'));
});

// Home > Campus > Campu > Edit

Breadcrumbs::for('campus.edit', function($trail, $campus){
    $trail->parent('campus.show', $campus);
    $trail->push("Editar", route('campus.edit', $campus->id));
});

// Home > Users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('admin');
    $trail->push('Usuarios', route('users'));
});

// Home > Users > User
Breadcrumbs::for('user', function ($trail, $user) {
    $trail->parent('users');
    $trail->push($user->name, route('users.show', $user->id));
});

// Home > Users > Create User
Breadcrumbs::for('user.create', function ($trail) {
    $trail->parent('users');
    $trail->push("Crear", route('users.create'));
});

// Home > Users > User > Edit
Breadcrumbs::for('user.edit', function ($trail, $user) {
    $trail->parent('user', $user);
    $trail->push("Editar", route('users.edit', $user->id));
});

// Home > Administracion > Jobs
Breadcrumbs::for('jobs.index', function($trail){
    $trail->parent('admin');
    $trail->push('Puestos', route('jobs.index'));
});

// Home > Administracion > Jobs > [Job]
Breadcrumbs::for('jobs.show', function($trail, $job){
    $trail->parent('jobs.index');
    $trail->push($job->name, route('jobs.show', $job));
});

// Home > Administracion > Jobs > Agregar
Breadcrumbs::for('jobs.create', function($trail){
    $trail->parent('jobs.index');
    $trail->push('Agregar Puesto', route('jobs.create'));
});

// Home > Administracion > Jobs > Editar
Breadcrumbs::for('jobs.edit', function($trail, $job){
    $trail->parent('jobs.index');
    $trail->push("Editar $job->name", route('jobs.edit', $job));
});

// Home > Create Employee
Breadcrumbs::for('employees.create', function($trail){
    $trail->parent('home');
    $trail->push("Crear Empleado" , route('employees.create'));
});

// Home > Edit Employee
Breadcrumbs::for('employees.edit', function($trail, $employee){
    $trail->parent('home');
    $trail->push("Editar Empleado $employee->name" , route('employees.edit', $employee));
});

// Home > View Employee
Breadcrumbs::for('employees.show', function($trail, $employee){
    $trail->parent('home');
    $trail->push( $employee->name , route('employees.show', $employee));
});
