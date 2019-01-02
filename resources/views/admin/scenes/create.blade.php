@extends('layouts.app')
@section('content')
    <div class="container">
        <section class="admin">
            <div class="options">
                <a href="{{route('scenes.create')}}" title="new Scene" class="btn">New Scene</a>
                <a href="{{route('scenes.index')}}" title="new Scene" class="btn">View All</a>
            </div>
            <div class="form">

                {!! Form::open(array('route' => array('scenes.store'), 'method' => 'POST', 'files' => true)) !!}
                <div class="half">
                    <div class="form-group">
                        {{ Form::label('Title', null, ['class' => 'control-label']) }}
                        {!! Form::text('title', old('title'),['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Text', null, ['class' => 'control-label']) }}
                        {!! Form::textarea('text', old('text'),['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Sound', null, ['class' => 'control-label']) }}
                        {!! Form::select('sound_id', ['Select One'] + $sounds, old('sound_id'), ['class'=> 'select2 form-control']) !!}
                    </div>
                </div>
                <div class="half">
                    <div class="form-group">
                        <a href="/" class="btn">Add Choices</a>
                    </div>
                    <div class="form-group">
                        <a href="/" class="btn">Add Responses</a>
                    </div>
                </div>
                <div class="full">
                    {!! Form::submit('Create') !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </section>
    </div>
@endsection
