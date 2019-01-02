<?php

use Illuminate\Database\Seeder;
use App\Response;

class ResponsesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     * @return void
     */
    public function run() {
        $responses = array(
            [
                'text'          => 'I\'m glad you feel that way',
                'type_id'       => 1,
                'scene_id'      => 1,
                'next_scene_id' => 2

            ],
            [
                'text'          => 'Good Answer',
                'type_id'       => 2,
                'scene_id'      => 1,
                'next_scene_id' => 3
            ],
            [
                'text'          => 'Why don\'t you try again',
                'type_id'       => 3,
                'scene_id'      => 1,
                'next_scene_id' => 1
            ],
            [
                'text'          => 'People Be Crazy',
                'type_id'       => 1,
                'scene_id'      => 2,
                'next_scene_id' => 3

            ],
            [
                'text'          => 'No , just no!',
                'type_id'       => 2,
                'scene_id'      => 2,
                'next_scene_id' => 4

            ],
            [
                'text'          => 'That\'s insane!',
                'type_id'       => 3,
                'scene_id'      => 2,
                'next_scene_id' => 1
            ]

        );

        foreach ( $responses as $response ) {
            $new_response                = new Response;
            $new_response->text          = $response['text'];
            $new_response->type_id       = $response['type_id'];
            $new_response->scene_id      = $response['scene_id'];
            $new_response->next_scene_id = $response['next_scene_id'];
            $new_response->save();
        }
    }
}
