<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('tutoracademico')->user();

    //dd($users);

    return view('tutoracademico.home');
})->name('home');

