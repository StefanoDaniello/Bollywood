@extends('layouts.app')
@section('content')
<div class="container my-4 d-flex justify-content-center align-items-center flex-column">
    {{-- <div class="mask1">
        <img src="img\all_movies.jpg" alt="" >
    </div> --}}
    <div id="moviesCarousel" class="carousel carousel-dark slide mx-4">
        <h1 class="text-center text-white">Most Popular Movies</h1>
        <div class="carousel-indicators">
            @foreach ($movies as $key => $movie)
            <button type="button" data-bs-target="#moviesCarousel" data-bs-slide-to="{{$key}}" @if($key == 0) class="active bg-white" @else class="bg-white" @endif aria-label="Slide {{$key + 1}}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($movies as $key => $movie)
            <div class="carousel-item @if($key == 0) active @endif" data-bs-interval="10000">
                <img src="https://www.repstatic.it/content/nazionale/img/2020/05/07/112203308-19805bf2-2c83-4fdf-9d47-3273349c3847.jpg?webp" class="d-block w-100" alt="{{$movie->title}}">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-white">{{$movie->title}}</h5>
                    <p class="text-white">{{$movie->description}}</p>
                </div>
            </div>
            @endforeach
        </div>
        
        <button class="carousel-control-prev " type="button" data-bs-target="#moviesCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#moviesCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

</div>
@endsection

<style lang="scss" scoped>
  .carousel{
    width: 1000px
  }
  .carousel-control-prev-icon, .carousel-control-next-icon {
    background-color: gray ;
    border-radius: 50%;
  }
  /* .mask1 {
  -webkit-mask-image: url(img/bollywood.png);
  mask-image: url(img/bollywood.png);
  -webkit-mask-repeat: no-repeat;
  mask-repeat: no-repeat; 
  -webkit-mask-position: center;
  mask-position: center;
  -webkit-mask-size: cover;
  mask-size: cover;
  img{
    width: 1500px;
    height: 400px;
  }   
} */

</style>