@extends('admin.content')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> {{$name}}</h4>

    <p>
        <a title="Return" href="{{url('branch')}}"><i class='bx bx-left-arrow-alt'></i>
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
            <p class="mb-0">Silahkan Edit Data {{$name}}</p>
          </div>
          <div class="card-body">
            <form method="POST" action="{{url('update/branch')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$row->id}}" name="id">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="branch_id">branch_id</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    id="branch_id"
                    name="branch_id"
                    value="{{$row->branch_id}}"
                    placeholder="branch_id"
                    step="any"
                  />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="branch_name">branch_name</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    id="branch_name"
                    name="branch_name"
                    value="{{$row->branch_name}}"
                    placeholder="branch_name"
                    step="any"
                  />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">branch category</label>
                <div class="col-sm-10">
                <select class="form-select" id="branch_category" name="branch_category" aria-label="branch category" required>
                  <option selected value="{{$row->branch_category}}">{{$row->category}}</option>
                  @foreach($category as $key)
                    <option value="{{$key->id}}">{{$key->name}}</option>
                  @endforeach
                </select>
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