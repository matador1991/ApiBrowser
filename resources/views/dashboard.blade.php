@extends('layouts.app')

@section('content')
    <div class="container-fluid justify-content-center">
        <div class="row justify-content-center">
            <div class="card text-white" style="border:none;
background-color: inherit">
                <img class="card-img-top" src="{{asset('image/gif.png')}}" alt="Card image"  >
            </div>
        </div>
      <div class="row justify-content-center" style="height: 1200px">
          <div class="col-3" >
        <form method="post" action="{{route('search')}}">
            @csrf
            <div class="input-group">
                <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..."
                        style="width:60%">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
          </div>
      </div>

    </div>
@endsection
