<?php

View::composer('layouts.main', function($view) {
    $viewData = array(
        'maps' => Map::all()->sortBy('name'),
        'user' => Auth::user(),
    );
    $view->with($viewData);
});