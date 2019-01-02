<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;
use App\Player;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // $games = Game::all()->first();

        // todo: Have player create or login after first scene. allow them to play and then ask if they want to continue with an account to save progress
        $player = Player::whereId(1)->first();

        $game = Game::firstOrCreate(['player_id' => $player->id]);

        return view('home')->with(compact('game', 'player'));
    }

}
