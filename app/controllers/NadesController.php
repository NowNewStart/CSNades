<?php

class NadesController extends BaseController {

    public function addNade()
    {
        # code...
    }

    public function editNade()
    {
        # code...
    }

    public function deleteNade()
    {
        # code...
    }

    public function showNadesInMap(Map $map)
    {
        return $map;
    }

    public function showMapAtPopSpot(Map $map, $pop)
    {
        return $map . " | " . $pop;
    }

    public function showNadeForm()
    {
        return "lawl nades";
    }
}
