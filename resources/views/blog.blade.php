@extends('layouts.app')

@section('content')
{!! Toastr::message() !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
        <h2 class="tm-gold-text tm-title">Liste de tous les articles </h2>
        <p class="tm-subtitle">Créer un nouvel article
            <a href="{{ route('blog.create') }}" class="btn btn-info">Ajouter</a>  
        </p>
    </div>
</div>
{{-- <section class="tm-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                <h2 class="tm-gold-text tm-title">Bienvenue sur votre Dashboard {{ Auth::user()->name }} !</h2>
                <p class="tm-subtitle">Créer un nouvel article
                    <a href="{{ route('blog.create') }}" class="btn btn-info">Ajouter</a>  
                </p>
            </div>
        </div>
        <div class="row">
            @foreach($post as $posts)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="card">
                    <img src="img/tm-img-310x180-1.jpg" alt="Image" class="tm-margin-b-20 img-fluid">
                    <div class="card-body">
                        <h4 class="tm-margin-b-20 tm-gold-text">{{ $posts ->title  }}</h4>
                        <p class="tm-margin-b-20">{{ $posts ->subtitle  }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('blog.show', $posts->id) }}" class="btn btn-info" style="width: 40%; margin-right: 50px;">Détails</a>
                        @if (request()->user()->id == $posts->user_id)    
                        <a href="{{ route('blog.edit', $posts->id) }}" class="btn btn-info" style="width: 40%">Edit</a>   
                        @endif
                    </div>
                </div>  
            </div>
            @endforeach
        </div>
    </div> 
    {!! $post->links() !!}
    

    </div>
</section> --}}


        @foreach($posts as $post)
            <div class="widget-content widget-content-area" style="display:inline-block">
                <div class="card component-card_4">
                    <div class="card-body">
                        <div class="user-profile">
                            <img src="assets/img/90x90.jpg" class="" alt="...">
                        </div>
                        <div class="user-info">
                            <h5 class="card-user_name">{{ $post ->title  }}</h5>
                            <p class="card-user_occupation"><b>Posté par: </b>{{ $post->user->name }}</p>
                            <div class="card-star_rating">
                            <p class="card-text">{{ $post ->subtitle }}. </p>
                            </div>
                            <p><p>
                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-info">Détails</a>
                            @if (request()->user()->id == $post->user->id)  
                            
                                {{-- <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-info" style="width: 40%">Edit</a> --}}
                                
                                <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary"> Modifier</a>    
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- {!! $post->links() !!} --}}
        <div class="d-flex justify-content-center">
            {{ $posts -> appends(request() -> input()) -> links('pagination::bootstrap-4') }}
        </div>
@endsection

