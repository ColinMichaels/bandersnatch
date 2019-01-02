@extends('layouts.app')
@section('content')
    <div class="container">
        <section class="admin">
            <div class="options">
                <a href="{{route('scenes.create')}}" title="new Scene" class="btn">New Scene</a>
                <a href="/" title="back to game" class="btn">BACK TO GAME</a>
            </div>
            <table>
                <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Text</th>
                <th>Music</th>
                <th>Choices</th>
                <th>Responses</th>
                <th>Edit</th>
                </thead>
                <tbody>
                @foreach($scenes as $scene)
                    <tr>
                        <td>{{$scene->id}}</td>
                        <td>{{$scene->title}}</td>
                        <td>{{$scene->text}}</td>
                        <td><a href="{{$scene->music->url}}" target="_blank">{{$scene->music->title}}</a></td>
                        <td>{{$scene->choices->count()}}</td>
                        <td>{{$scene->responses->count()}}</td>
                        <td><a href="{{route('scenes.edit', $scene->id)}}" title="edit">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection

