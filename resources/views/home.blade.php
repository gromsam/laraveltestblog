@extends('layouts.app')

@section('content')
    <div class="jumbotron mt-5">
        <div class="container">
            <h1 class="display-4">Успех</h1>
            <p>Для молодых и успешных</p>
        </div>
    </div>
    <div class="container">

        <div class="d-flex justify-content-center">
            {{ $articles->links()  }}
        </div>


        @if(isset($articles))
            <div id="posts" class="mb-5 mt-4">
                @foreach($articles as $article)

                    @include('layouts.cardarticle', $article)

                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $articles->links()  }}
            </div>


        @endif
    </div>
@endsection
