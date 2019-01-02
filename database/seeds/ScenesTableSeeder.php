<?php

use Illuminate\Database\Seeder;
use App\Scene;

class ScenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scenes = array(
            [
                'title' => 'First Scene',
                'text' => 'Do you believe you are in control of your own destiny?',
                'sound_id' => 2,

            ],
            [
                'title' => 'Second Scene',
                'text' => 'Sugar Snaps or Frosted Flakes?',
                'sound_id' => 1,

            ],
            [
                'title' => 'Third Scene',
                'text' => 'would you like to continue?',
                'sound_id' => 1,

            ]
        );

        foreach($scenes as $scene){
            $new_scene = new Scene;
            $new_scene->title = $scene['title'];
            $new_scene->sound_id = $scene['sound_id'];
            $new_scene->text = $scene['text'];
            $new_scene->save();
        }
    }
}
