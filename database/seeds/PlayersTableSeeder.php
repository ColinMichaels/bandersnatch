<?php

use Illuminate\Database\Seeder;
use App\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players= array(
            ['game_id' => 1,
             'user_id' => 1,
             'username' => 'Colin',
             'email' => 'colinmichaels@gmail.com'

            ]
        );

        foreach($players as $player){
            $new_player = new Player;
            $new_player->game_id = $player['game_id'];
            $new_player->user_id = $player['user_id'];
            $new_player->username = $player['username'];
            $new_player->email = $player['email'];
            $new_player->save();

        }
    }
}
