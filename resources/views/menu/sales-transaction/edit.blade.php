@extends('admin.content')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> {{$name}}</h4>

    <p>
        <a title="Return" href="{{url('sales-transaction')}}"><i class='bx bx-left-arrow-alt'></i>
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
            <form method="POST" action="{{url('update/sales-transaction')}}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{$row->id}}">

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
            <label class="col-sm-2 col-form-label" for="sales_date">sales_date</label>
            <div class="col-sm-10">
                <input class="form-control" type="date" id="sales_date" value="{{$row->sales_date}}" name="sales_date" required>
            </div>
          </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="sales_amount">sales_amount</label>
                <div class="col-sm-10">
                  <input
                    type="number"
                    class="form-control"
                    id="sales_amount"
                    name="sales_amount"
                    value="{{$row->sales_amount}}"
                    placeholder="sales_amount"
                    step="any"
                  />
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