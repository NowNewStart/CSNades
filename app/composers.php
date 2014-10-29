<?php

View::composer(array('layouts.main', 'nades.nade-form'), function($view) {
    $viewData = array(
        'maps' => Map::all()->sortBy('name'),
        'user' => Auth::user(),
    );
    $view->with($viewData);
});