<?php
/**
 * Created by PhpStorm.
 * User: itcyb
 * Date: 4/24/2018
 * Time: 6:16 PM
 */

Router::get('', function () {
    $movies = DB::All('movies');
    $m = 'No Movies';
    $genres = DB::All('genre');
    foreach ($movies as $movie) {
        if ($m == 'No Movies') {
            $m = "<div class='video' onclick='loadVideo(\"" . $movie['path'] . "\",\"" . $movie['title'] . "\")'><p class='header'>" . $movie['title'] . "</p></div>";
        } else {
            $m .= "<div class='video' ' onclick='loadVideo(\"" . $movie['path'] . "\",\"" . $movie['title'] . "\")'><p class='header'>" . $movie['title'] . "</p></div>";
        }
    }
    $data = '<h1>Videos</h1><div class="row">' . $m . '</div>';
    View::load('index', ['data' => $data, 'genres' => $genres]);
});
Router::get('home', function () {
    $movies = DB::All('movies');
    $m = 'No Movies';
    foreach ($movies as $movie) {
        if ($m == 'No Movies') {
            $m = "<div class='video' onclick='loadVideo(\"" . $movie['path'] . "\",\"" . $movie['title'] . "\")'><p class='header'>" . $movie['title'] . "</p></div>";
        } else {
            $m .= "<div class='video' ' onclick='loadVideo(\"" . $movie['path'] . "\",\"" . $movie['title'] . "\")'><p class='header'>" . $movie['title'] . "</p></div>";
        }
    }
    echo '<h1>Videos</h1><div class="row">' . $m . '</div>';
});
Router::get('upload', function () {
    $genres = DB::All('genre');
    foreach ($genres as $option) {
        $options = "<option value='" . $option['name'] . "'>" . $option['name'] . "</option>";
    }
    View::load('upload', ['options' => $options]);
});

Router::get('genre', function () {
    View::load('genre');
});
Router::post('search', function () {
    extract($_POST);
    $data = DB::search(['title' => $name, 'actors' => $actor, 'genre' => $genre], 'movies');
    $m = 'No Movies';
    foreach ($data as $movie) {
        if ($m == 'No Movies') {
            $m = "<div class='video' onclick='loadVideo(\"" . $movie->path . "\",\"" . $movie->title . "\")'><p class='header'>" . $movie->title . "</p></div>";
        } else {
            $m .= "<div class='video' onclick='loadVideo(\"" . $movie->path . "\",\"" . $movie->title . "\")'><p class='header'>" . $movie->title . "</p></div>";
        }
    }
    echo '<h1>Videos</h1><div class="row">' . $m . '</div>';
});

Router::post('genre', function () {
    DB::put('genre', ['name' => $_POST['name']]);
});

Router::post('upload', function () {
    $file = Storage::store($_FILES['file']);
    DB::put('movies', ['title' => $_POST['name'], 'actors' => $_POST['actors'], 'genre' => $_POST['genre'], 'path' => $file]);
    header('location:/');
});