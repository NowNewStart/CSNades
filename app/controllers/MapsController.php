<?php

class MapsController extends BaseController {

    public function showAllMaps()
    {
        $maps = Map::all();

        $viewData = array(
            'maps' => $maps,
            'heading' => 'Maps',
        );

        return View::make('all-maps')->with($viewData);
    }

    public function showMap($slug)
    {
        return $slug;
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
