<?php

use Illuminate\Database\Seeder;

use App\Sound;

class SoundsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     * @return void
     */
    public function run() {
        $sounds = array(
            [

                'title'    => 'Sleep_Trance',
                'creator'  => 'Lee_Rosevere',
                'source'   => 'Lee_Rosevere_-_01_-_Sleep_Trance.mp3',
                'location' => 'internal'
            ],
            [
                'title'    => 'Taking the Time',
                'creator'  => 'Lee Rosevere',
                'source'   => 'Lee_Rosevere_-_02_-_Taking_the_Time_shortned.mp3',
                'location' => 'internal'
            ],
            [
                'title'    => 'Spirit Inside',
                'creator'  => 'Lobos Loco',
                'source'   => 'Lobo_Loco_-_05_-_Spirit_Inside_ID_819.mp3',
                'location' => 'internal'
            ]
        );

        foreach ( $sounds as $sound ) {
            $new_sound           = new Sound;
            $new_sound->title    = $sound['title'];
            $new_sound->creator  = $sound['creator'];
            $new_sound->source   = $sound['source'];
            $new_sound->location = $sound['location'];
            $new_sound->save();

        }
    }
}
