@extends('admin.content')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms / </span> {{$name}}</h4>

    <p>
        @if(Session::get('id_privileges')==1)
            <a title="Return" href="{{url('index/artikel')}}"><i class='bx bx-left-arrow-alt'></i>
            &nbsp; Back To List Data</a>
        @else
            <a title="Return" href="{{url('index/artikel/users')}}"><i class='bx bx-left-arrow-alt'></i>
            &nbsp; Back To List Data</a>
        @endif
    </p>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="row mb-5">
        <div class="col-sm-12">
          <div class="card h-100">
            @if($row->foto)
                <img src="{{Helper::fotoUrl().'/'.$row->foto}}" class="card-img-top" height="450px" alt="">
            @else
                <img class="card-img-top" src="{{url('assets/img/elements/2.jpg')}}" height="450px" alt="Card image cap" />
            @endif
            <div class="card-body">
              <h5 class="card-title">{{$row->judul}}</h5>
              <p class="card-text">
                @php
                    echo $row->content;
                @endphp
              </p>
              <p class="card-text"><small class="text-muted">by : {{$row->users}}, Tanggal : {{$row->tanggal}}, Kategori : {{$row->kategori_artikel}}</small></p>
            </div>
          </div>
        </div>

    </div>
</div>

@endsection