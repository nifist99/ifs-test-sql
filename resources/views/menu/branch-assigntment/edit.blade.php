@extends('admin.content')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> {{$name}}</h4>

    <p>
        <a title="Return" href="{{url('branch-assigntment')}}"><i class='bx bx-left-arrow-alt'></i>
            &nbsp; Back To List Data</a>
    </p>

    {{-- error --}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('message'))

        <div class="alert alert-{{session('message_type')}} alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif


{{-- error --}}
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <p class="mb-0">Silahkan Masukan Data {{$name}}</p>
          </div>
          <div class="card-body">
            <form method="POST" action="{{url('update/branch-assigntment')}}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{$row->id}}" name="id">

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">sales</label>
              <div class="col-sm-10">
              <select class="form-select" id="sales_id" name="sales_id" aria-label="sales id" required>
                <option selected value="{{$row->sales_id}}">{{$row->sales}}</option>
                @foreach($sales as $key)
                  <option value="{{$key->id}}">{{$key->sales_id}}</option>
                @endforeach
              </select>
            </div>
          </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">branch</label>
              <div class="col-sm-10">
              <select class="form-select" id="branch_id" name="branch_id" aria-label="branch id" required>
                <option selected value="{{$row->branch_id}}">{{$row->branch}}</option>
                @foreach($branch as $val)
                  <option value="{{$val->id}}">{{$val->branch_id}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="valid_from">valid_from</label>
            <div class="col-sm-10">
                <input class="form-control" type="date" value="{{$row->valid_from}}" id="valid_from" name="valid_from" required>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="valid_to">valid_to</label>
            <div class="col-sm-10">
                <input class="form-control" type="date" id="valid_to" value="{{$row->valid_to}}" name="valid_to" required>
            </div>
          </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection