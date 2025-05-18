<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
        $files = [
        ["name" => "Książka kucharska anarchisty.pdf",
         "description"=>"Jak sama nazwa wskazuje", 
         "author" => "Matierych",
         "id" => 1],
        ["name" => "Zrewizjowana czarna księga - przewodnik materiałów wybuchowych produkowanych polowo.pdf",
         "description"=>"Interesująca księga", 
         "author" => "Matierych",
         "id" => 2],
        ["name" => "Hymn_Niemiec.mp4",
         "description"=>"Mój ulubiony utwór", 
         "author" => "Donäld Tüßk",
         "id" => 3]
    ];
    
    return view('welcome' ,["files" => $files]);
});

Route::get('/login', function(){
    return view('accountManagement.login');
});

Route::get('/register', function(){
    return view('accountManagement.register');
});

Route::get('/files/{id}', function ($id) {
    return view('files.fileSite' ,["id" => $id]);
});