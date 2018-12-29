@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <section class="section" id="game">
               <game></game>
        </section>
    </div>
    </div>
@endsection
@push('scripts')
    <script>

        const app = new Vue({
            el : "#game"
        } );
    </script>
@endpush
