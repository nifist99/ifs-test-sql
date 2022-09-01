@extends('admin.content')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> {{$name}}</h4>

    <p>
        <a title="Return" href="{{url('sales')}}"><i class='bx bx-left-arrow-alt'></i>
            &nbsp; Back To List Data</a>
    </p>

    {{-- error --}}

        @if($errors->any())
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
            <h5 class="mb-0">Silahkan Edit Data {{$name}}</h5>
            <small class="text-muted float-end">{{Session::get('name')}}</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{url('update/sales')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$row->id}}">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="sales_id">sales_id</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="sales_id" value="{{$row->sales_id}}" id="sales_id" placeholder="sales_id" required/>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="sales_name">sales_name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="sales_name" value="{{$row->sales_name}}" id="sales_name" placeholder="sales_name" required/>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="join_date">join_date</label>
                <div class="col-sm-10">
                    <input class="form-control" type="date" id="join_date" value="{{$row->join_date}}" name="join_date" required>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="manager">manager</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="manager" value="{{$row->manager}}" id="manager" placeholder="manager" required/>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

@push('js')
  <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
  <script>
// Remove a plugin from the default setup.
ClassicEditor
    .create( document.querySelector( '#content' ), {
        removePlugins: [ 'Heading' ],
        toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' , 'link' ]
    } )
    .catch( error => {
        console.log( error );
    } );

</script>
@endpush
@endsection