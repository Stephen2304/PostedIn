@extends('layouts.app')

@section('content')

<section class="tm-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">

                <section>
                    <h3 class="tm-gold-text tm-form-title">
                        @if($post->id)
                           Modification d'un article
                        @else
                            Création d'un article
                        @endif
                    </h3>
                    <p class="tm-form-description">Vivamus accumsan blandit ligula. Sed lobortis efficitur sapien. Quisque vel sem eu turpis ullamcorper euismod. Praesent quis nisi ac augue luctus viverra. Sed et dui nisi. Fusce vitae dapibus justo.</p> 
                    <form action="{{ ($post->id) ? route('blog.update', $post) : route('blog.store') }}" method="POST" class="tm-contact-form">     
                        @csrf
                        @if($post->id)
                        <input type="hidden" name="_method" value="PUT">
                        @endif
                        
                        <div class="form-group @if($errors->first('title')) has-danger @endif">
                            <label for="title">Titre</label>
                            <input type="text" id="title" name="title" class="form-control @if($errors->first('title')) is-invalid @endif" placeholder="Titre" value="{{ old('title') ?? $post->title }}"  required/>
                            @error('title')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group @if($errors->first('subtitle')) has-danger @endif">
                            <label for="subtitle">Sous titre</label>
                            <input type="text" id="subtitle" name="subtitle" class="form-control @if($errors->first('subtitle')) is-invalid @endif" placeholder="Sous-titre"  value="{{ old('subtitle') ?? $post->subtitle }}" required/>
                            @error('subtitle')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group @if($errors->first('image')) has-danger @endif">
                            <label for="image">Sous titre</label>
                            <input type="file" id="image" name="image" class="form-control @if($errors->first('image')) is-invalid @endif" value="{{ old('image') ?? $post->image }}" required/>
                            @error('image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group @if($errors->first('content')) has-danger @endif">
                            <label for="content">Contenu</label>
                            <textarea id="content" name="content" class="form-control @if($errors->first('content')) is-invalid @endif" rows="10" placeholder="Contenu" required>{{ old('content') ?? $post->content }}</textarea>
                            @error('content')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">
                              @if($post->id)
                              Modifier
                              @else
                              Ajouter
                              @endif
                            </button>
                            <button type="reset" class="btn btn-primary mt-4">
                              Réinitialiser
                            </button>
                          </div>                         
                    </form>   
                </section>                     
         

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-contact-right">
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="tm-aside-container">
                            <h3 class="tm-gold-text tm-title">
                                Categories
                            </h3>
                            <nav>
                                <ul class="nav">
                                    <li><a href="#" class="tm-text-link">Lorem ipsum dolor sit</a></li>
                                    <li><a href="#" class="tm-text-link">Tincidunt non faucibus placerat</a></li>
                                    <li><a href="#" class="tm-text-link">Vestibulum tempor ac lectus</a></li>
                                    <li><a href="#" class="tm-text-link">Elementum egestas dui</a></li>
                                    <li><a href="#" class="tm-text-link">Nam in augue consectetur</a></li>
                                    <li><a href="#" class="tm-text-link">Text Link Color #006699</a></li>
                                </ul>
                            </nav>   
                        </div>
                         
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

@endsection