<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllers extends Controller
{
    //
}

route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

route::get('/settings', function () {
    return view('settings');
})->middleware(['auth'])->name('settings');

route::get('/settings/profile', function () {
    return view('settings.profile');
})->middleware(['auth'])->name('settings.profile');

route::get('/settings/password', function () {
    return view('settings.password');
})->middleware(['auth'])->name('settings.password');

route::get('/settings/appearance', function () {
    return view('settings.appearance');
})->middleware(['auth'])->name('settings.appearance');

route::get('/settings/notifications', function () {
    return view('settings.notifications');
})->middleware(['auth'])->name('settings.notifications');

route::get('/settings/api', function () {
    return view('settings.api');
})->middleware(['auth'])->name('settings.api');

route::get('/settings/teams', function () {
    return view('settings.teams');
})->middleware(['auth'])->name('settings.teams');

route::get('/settings/teams/create', function () {
    return view('settings.teams.create');
})->middleware(['auth'])->name('settings.teams.create');

route::get('/settings/teams/{team}', function ($team) {
    return view('settings.teams.show', ['team' => $team]);
})->middleware(['auth'])->name('settings.teams.show');

route::get('/settings/teams/{team}/edit', function ($team) {
    return view('settings.teams.edit', ['team' => $team]);
})->middleware(['auth'])->name('settings.teams.edit');


route::get('/settings/teams/{team}/members', function ($team) {
    return view('settings.teams.members', ['team' => $team]);
})->middleware(['auth'])->name('settings.teams.members');

route::get('/settings/teams/{team}/members/create', function ($team) {
    return view('settings.teams.members.create', ['team' => $team]);
})->middleware(['auth'])->name('settings.teams.members.create');

route::get('/settings/teams/{team}/members/{user}', function ($team, $user) {
    return view('settings.teams.members.show', ['team' => $team, 'user' => $user]);
})->middleware(['auth'])->name('settings.teams.members.show');

route::get('/settings/teams/{team}/members/{user}/edit', function ($team, $user) {
    return view('settings.teams.members.edit', ['team' => $team, 'user' => $user]);
})->middleware(['auth'])->name('settings.teams.members.edit');

route::get("/contact", function () {
    return view("contact");
})->name("contact");


