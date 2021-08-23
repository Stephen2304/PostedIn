@extends('layouts.app')

@section('content')
{!! Toastr::message() !!}
<section class="tm-section">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                <div class="tm-blog-post">
                    <h3 class="tm-gold-text">{{ $post -> title  }}</h3>
                    <p>{{ $post -> subtitle  }}</p>
                    <img src="../img/tm-img-1010x336-1.jpg" alt="Image" class="img-fluid tm-img-post">
                    <div class="media-body">
                        <p class="media-text">{{ $post -> content  }}.</p>
                    </div>
                    <p></p>

                </div>
                @if (request()->user()->id == $post->user_id)
                <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-info" style="width: 10%">Edit</a>
                @endif
                
            </div>

            <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 tm-aside-r">

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
                            <li><a href="#" class="tm-text-link">Fusce non turpis euismod</a></li>
                            <li><a href="#" class="tm-text-link">Text Link Color #006699</a></li>
                        </ul>
                    </nav>
                    <hr class="tm-margin-t-small">      
                </div>
                
                
            </aside>

        </div>
        
    </div>
</section>


@endsection