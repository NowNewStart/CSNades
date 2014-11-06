<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class NadesController extends BaseController {

    public function addNade()
    {
        //
    }

    public function saveNade($id = null)
    {
        if ($id) {
            $nade = Nade::find($id);
        } else {
            $nade = new Nade();
        }

        $map  = Map::find(Input::get('map'));
        $user = Auth::user();

        $nade->map()->associate($map);
        $nade->user()->associate($user);

        $nade->type        = Input::get('type');
        $nade->pop_spot    = Input::get('pop_spot');
        $nade->title       = Input::get('title');
        $nade->imgur_album = Input::get('imgur_album');
        $nade->youtube     = Input::get('youtube');
        $nade->tags        = Input::get('tags');
        $nade->is_working  = Input::get('is_working');

        if (Auth::user()->is_mod && Input::get('is_approved')) {
            $nade->approved_by()->associate(Auth::user());
            $nade->approved_at = $nade->freshTimestamp();
        }

        // if ($nade->save()) {
        //     Session::flash('flashSuccess', 'The nade has been saved!');
        //     Redirect::action('NadesController@showNadeForm');
        // }
        
        if (!$nade->save()) {
            return Redirect::action('NadesController@showNadeForm')
                    ->withFlashDanger('There were some problems with your nade.')
                    ->withErrors($nade->getValidator())
                    ->withInput();
        }

        $viewData = array(
            'heading'   => 'Add a Nade',
            // 'maps'      => Map::all()->sortBy('name'),
            'nadeTypes' => Nade::getNadeTypes(),
            'popSpots'  => Nade::getPopSpots(),
        );

        return Redirect::action('NadesController@showNadeForm')
                ->withFlashSuccess('Your nade has been saved.');

        // Session::flash('flashError', 'The nade was not saved!');
        // return View::make('nades.nade-form')->with($viewData);
    }

    public function deleteNade()
    {
        # code...
    }

    public function showNadesInMap(Map $map)
    {
        // Grouped Nades
        // $nades = array();
        // $nadeTypes = Nade::getNadeTypes();

        // foreach ($map->nades as $nade) {
        //     foreach ($nadeTypes as $nadeTypeKey => $nadeType) {
        //         if ($nade->type == $nadeTypeKey) {
        //             $nades[$nadeTypeKey][] = $nade;
        //         }
        //     }
        // }

        $nades = $map->nades()->where('approved_at', '>', '2014-10-13')
                              ->orderBy('approved_at', 'desc')
                              ->orderBy('created_at', 'desc')
                              ->orderBy('id', 'desc')
                              ->get();

        $viewData = array(
            'heading'   => "$map->name Nades",
            'map'       => $map,
            'nades'     => $nades,
            // 'nadeTypes' => $nadeTypes, // For grouped nades
        );
        return View::make('nades.ungrouped')->with($viewData);
    }

    public function showMapAtPopSpot(Map $map, $pop)
    {
        return $map . " | " . $pop;
    }

    public function showNadeForm()
    {
        $viewData = array(
            'heading'   => 'Add a Nade',
            // 'maps'      => Map::all()->sortBy('name'),
            'nadeTypes' => Nade::getNadeTypes(),
            'popSpots'  => Nade::getPopSpots(),
        );

        return View::make('nades.nade-form')->with($viewData);
    }
}
