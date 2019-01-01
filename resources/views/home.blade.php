@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <section class="section" id="game">
            <Navbar></Navbar>
               <game></game>
        </section>
    </div>

@endsection
@push('scripts')
    <script>
        const app = new Vue({
            el : "#game",
            name: 'Game'
        } );
    </script>
@endpush
