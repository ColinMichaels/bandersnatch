<?php

namespace App\Http\Controllers\Api;

use App\Transformers\GamesTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Game;
use App\Player;

use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Serializer\ArraySerializer;

class GameController extends Controller
{

    protected $manager;
    protected $game;

    public function __construct(Manager $manager, Game $game)
    {
        $this->manager = $manager;
        $this->manager->setSerializer(new ArraySerializer());
        $this->game = $game;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json(Game::all()->map(function($game){
             return $this->manager->createData( new Fractal\Resource\Item($game, new GamesTransformer()))->toArray();
        }));
        

    }

    public function getGame($player_id){

        $player = Player::findOrFail($player_id)->first();

        $game =  Game::firstOrCreate(['player_id' => $player->id]);

        return response()->json([$this->manager->createData( new Fractal\Resource\Item($game, new GamesTransformer()))->toArray()]);

    }

    public function getScene( $next_scene_id, $player_id, $prev_scene_id){

        $player = Player::findOrFail($player_id)->first();

        $game =  Game::firstOrCreate(['player_id' => $player->id]);

        $game->scene_id = $next_scene_id;
        $game->save();

        return response()->json([$this->manager->createData( new Fractal\Resource\Item($game, new GamesTransformer()))->toArray()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
