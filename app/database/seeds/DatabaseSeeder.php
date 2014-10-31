<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('MapTableSeeder');
	}

}

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
            'Old Season'  => 'http://i.imgur.com/zqaGDDe.jpg',
            'New Season'  => 'http://i.imgur.com/J3PEqqF.jpg',
            'Mirage'      => 'http://i.imgur.com/0VrFWc1.png',
            'Cobblestone' => 'http://i.imgur.com/jGOhgDq.png',
            'Overpass'    => 'http://i.imgur.com/nZBVBLR.png',
            'Sparity'     => 'http://i.imgur.com/oIOMBpt.jpg',
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

class NadesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('nades')->delete();

        $map = Map::find(1);
        $user = User::find(1);

        
    }
}