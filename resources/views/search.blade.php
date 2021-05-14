@extends('layouts.app')

@section('content')
  <div class="container-fluid justify-content-center">
      <ul class="navbar-nav" >
          <li class="nav-item dropdown no-arrow mx-1">
              <a class="dropdown-item" href="{{route('dashboard')}}" style="color:blue;background-color: inherit">
                  <i class="fas fa-step-backward fa-sm fa-fw mr-2 " style="color:blue" ></i>
                  Go Back
              </a>
          </li>
      </ul>
    <div class="row justify-content-center">
        <div class="card text-white" style="border:none;background-color: inherit">
            <img class="card-img-top" src="{{asset('image/gif.png')}}" alt="Card image"  >
        </div>
    </div>
      <hr>
      <div class="row justify-content-center">
          @if(isset($data) && count($data) > 0)
              @foreach($data as $d)

          <div class="col-md-4 col-sm-6 col-12 my-4">
              <img src="{{asset('image/'.$d['name'])}}" style="width:100%;height: 100%">
          </div>



              @endforeach
          @else
              <div class="col-12 text-center">
                  <p class="text-center" style="color: red;font-weight: bolder">
                      No Data Reach
                  </p>
              </div>
          @endif
      </div>
  </div>
@endsection
