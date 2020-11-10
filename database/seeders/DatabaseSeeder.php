<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'sho',
            'email' => 's.ohtani.de@gmail.com',
            'password' => bcrypt('password1234')
        ]);

        $types = [
            [
                'name' => 'textile',
                'password' => null
            ],
            [
                'name' => 'graphic',
                'password' => 'graphic'
            ],
            [
                'name' => 'illustration',
                'password' => 'illustration'
            ],
            [
                'name' => 'home',
                'password' => null
            ]
        ];
        foreach($types as $type) {
            Type::create($type);
        }

        // $photos = [
        //     [
        //         'path' => 'testImagePath1',
        //         'type_id' => 1
        //     ],
        //     [
        //         'path' => 'testImagePath2',
        //         'type_id' => 1
        //     ],
        //     [
        //         'path' => 'testImagePath3',
        //         'type_id' => 1
        //     ],
        //     [
        //         'path' => 'testImagePath4',
        //         'type_id' => 2
        //     ],
        //     [
        //         'path' => 'testImagePath5',
        //         'type_id' => 2
        //     ],
        //     [
        //         'path' => 'testImagePath6',
        //         'type_id' => 3
        //     ],
        // ];
        // foreach($photos as $photo) {
        //     Photo::create($photo);
        // }
    }
}
