<?php

class MapTableSeeder extends Seeder {
    public function run()
    {
        DB::table('maps')->delete();

        $maps = array(
            'Dust 2'      => 'http://i.imgur.com/LZLDJK5.png',
            'Train'       => 'http://i.imgur.com/z2xGdDI.png',
            'Nuke'        => 'http://i.imgur.com/rAilbaT.jpg',
            'Inferno'     => 'http://i.imgur.com/PqhA3om.png',
            'Cache'       => 'http://i.imgur.com/Im0kNDY.png',
            'Season'      => 'http://i.imgur.com/J3PEqqF.jpg',
            'Mirage'      => 'http://i.imgur.com/0VrFWc1.png',
            'Cobblestone' => 'http://i.imgur.com/jGOhgDq.png',
            'Overpass'    => 'http://i.imgur.com/nZBVBLR.png',
        );

        foreach ($maps as $key => $value) {
            $slug = Str::slug($key);

            if ('dust-2' === $slug) {
                $slug = 'dust2';
            }

            Map::create(array(
                'name'  => $key,
                'slug'  => $slug,
                'image' => $value,
            ));
        }
    }
}
