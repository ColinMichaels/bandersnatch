@extends('layouts.app')
@section('content')
    <div class="container">
        <section class="admin">
            <div class="options">
                <a href="{{route('scenes.create')}}" title="new Scene" class="btn">New Scene</a>
                <a href="{{route('scenes.index')}}" title="new Scene" class="btn">View All</a>
            </div>
            <div class="title">
                <h2 class="text-white">SCENE: {{$scene->title}} | {{$scene->id}}</h2>
            </div>
            <div class="form grid">
                <div class="half">
                    {!! Form::model($scene,array('route' => array('scenes.update', $scene->id), 'method' => 'PUT', 'files' => true)) !!}
                    <div class="form-group">
                        {{ Form::label('Title', 'title', ['class' => 'control-label']) }}
                        {!! Form::text('title', $scene->title,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Text', 'text', ['class' => 'control-label']) }}
                        {!! Form::textarea('text', $scene->text,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Sound', 'sound_id', ['class' => 'control-label']) }}
                        {!! Form::select('sound_id', ['Select One'] + $sounds, $scene->sound_id, ['class'=> 'select2 form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Media', 'media', ['class' => 'control-label']) }}
                        {!! Form::file('media') !!}

                        @include('admin.partials.media-library', ['media_files' => $scene->getMedia('media')])
                    </div>
                    </div>
                </div>
                <div class="half">
                    <div class="form-group">
                        <h4 class="text-white">Choices</h4>
                        <table class="small">
                            <thead>
                            <th>ID</th>
                            <th>TEXT</th>
                            <th>Action</th>
                            <th>Type</th>
                            </thead>
                            <tbody>
                       @foreach($scene->choices as $choice)
                               <tr>
                                   <td>{{$choice->id}}</td>
                                   <td>{{$choice->text}}</td>
                                   <td>{{$choice->action}}</td>
                                   <td>{{$choice->type_id}}</td>

                               </tr>
                           @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="form-group">
                        <h4 class="text-white">Responses</h4>
                        <table class="small">
                            <thead>
                            <th>ID</th>
                            <th>TEXT</th>
                            <th>Next Scene</th>
                            <th>Type</th>
                            </thead>
                            <tbody>
                            @foreach($scene->responses as $response)
                                <tr>
                                    <td>{{$response->id}}</td>
                                    <td>{{$response->text}}</td>
                                    <td>{{$response->next_scene_id}}</td>
                                    <td>{{$response->type_id}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="full">
                    {!! Form::submit('Update') !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </section>
    </div>
@endsection
