<?php

View::composer('main', function($view) {
    $maps = Map::all()->sortBy('name');
    $view->with('maps', $maps);
});