<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('encargado')->user();

    //dd($users);

    return view('encargado.home');
})->name('home');

