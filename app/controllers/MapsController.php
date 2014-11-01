<?php

class MapsController extends BaseController {

    public function showAllMaps()
    {
        $maps = Map::all()->sortBy('name');

        $viewData = array(
            'maps'    => $maps,
            'heading' => 'Maps',
        );

        return View::make('maps.all-maps')->with($viewData);
    }

    public function addMap()
    {
        # code...
    }

    public function editMap()
    {
        # code...
    }

    public function deleteMap()
    {
        # code...
    }
}
