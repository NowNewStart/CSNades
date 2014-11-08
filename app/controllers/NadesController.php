<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class NadesController extends BaseController {

    public function addNade()
    {
        //
    }

    public function saveNade(Nade $nade = null)
    {
        if (!$nade) {
            $nade = new Nade();
            $route = Redirect::route('get.nades.add');
        } else {
            $route = Redirect::route('get.nades.edit', $nade->id);
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

        if ($user->is_mod)
        {
            if (Input::get('is_approved')) {
                $nade->approve($user);
            } else {
                $nade->unapprove();
            }
        }
        
        if (!$nade->save()) {
            return $route->withFlashDanger('There were some problems with your nade.')
                         ->withErrors($nade->getValidator())
                         ->withInput();
        }

        return $route->withFlashSuccess('Your nade has been saved.');
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

    public function showNadeForm(Nade $nade = null)
    {
        if ($nade) {
            $route = array('post.nades.edit', $nade->id);
            $nade->is_approved = false;

            if ($nade->isApproved()) {
                $nade->is_approved = true;
            }
        } else {
            $nade      = new Nade();
            $nade->map = new Map();
            $route     = array('post.nades.add');
        }

        $viewData = array(
            'heading'   => 'Add A Nade',
            'mapList'   => Map::all()->sortBy('name')->lists('name', 'id'),
            'nade'      => $nade,
            'nadeTypes' => Nade::getNadeTypes(),
            'popSpots'  => Nade::getPopSpots(),
            'route'     => $route,
        );

        return View::make('nades.nade-form')->with($viewData);
    }

    public function showUnapprovedNades()
    {
        $nades    = Nade::where('approved_at', '<=', '2014-10-13')->get();
        $viewData = array(
            'heading' => 'Unapproved Nades',
            'nades'   => $nades,
        );

        return View::make('nades.ungrouped')->with($viewData);
    }
}
