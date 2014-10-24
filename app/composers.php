<?php

View::composer('main', function($view) {
    $viewData = array(
        'maps' => Map::all()->sortBy('name'),
        'user' => Auth::user(),
    );
    $view->with($viewData);
});