<?php

namespace App\Http\Controllers;

use App\Sound;
use Illuminate\Http\Request;

use App\Scene;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $scenes = Scene::all();

       return view('admin.scenes.index')->with(compact('scenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sounds = Sound::all()->pluck('title', 'id')->toArray();
        return view('admin.scenes.create')->with(compact('sounds'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        $scene = Scene::create($input);

        $scenes = Scene::all();

        return view('admin.scenes.index')->with(compact('scenes'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sounds = Sound::all()->pluck('title', 'id')->toArray();
        $scene = Scene::findOrFail($id);
        return view('admin.scenes.edit')->with(compact('scene', 'sounds'));
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
        $scene = Scene::findOrFail($id);
        DB::transaction(function () use ($request, $id, $scene) {

            Validator::make($request->all(), [
                'media' => 'mimes:jpg,jpeg,png'
            ])->validate();

            $input = $request->all();

            if(isset($request->media)){

                $scene->addMedia($request->media)->toMediaCollection('media');
            }

            $scene->update( $input );
        });

        return redirect()->back();
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
