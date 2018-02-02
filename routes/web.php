<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('webscraper');
});

Route::get('/web/crawler/title', function() {
    $crawler = Goutte::request('GET', 'https://inversemaha.wordpress.com');
    $crawler->filter('h2')->each(function ($node) {
        dump($node->text());
    });
});

Route::get('/web/crawler/link', function() {
    $crawler = Goutte::request('GET', 'https://inversemaha.wordpress.com');
    $crawler->filter('h2')->each(function ($node) {
        print "<a href='".$node->attr('href')."'>".$node->text()."</a><br/>";
    });
});