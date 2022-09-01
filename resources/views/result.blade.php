@extends('admin.content')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manu /</span> {{$name}}</h4>

    @if(session()->has('message'))

        <div class="alert alert-{{session('message_type')}} alert-dismissible fade show" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header">{{$name}} Number 2</h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sales Id</th>
                    <th>Sales Name</th>
                    <th>Branch Id</th>
                    <th>Branch Name</th>
                    <th>Branch Category</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list as $key)
                  <tr>
                    <td>{{$key->sales}}</td>
                    <td>{{$key->sales_name}}</td>
                    <td>{{$key->branch}}</td>
                    <td>{{$key->branch_name}}</td>
                    <td>{{$key->branch_category}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <center>
          <div class="mt-4">
              {{ $list->links() }}
          </div>
      </center>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header">{{$name}} Number 2</h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sales Id</th>
                    <th>Sales Name</th>
                    <th>Manager Id</th>
                    <th>Manager Name</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sales as $val)
                  <tr>
                    <td>{{$val->sales_id}}</td>
                    <td>{{$val->sales_name}}</td>
                    <td>{{$val->manager}}</td>
                    <td>{{Helper::manager($val->manager)}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <center>
          <div class="mt-4">
              {{ $sales->links() }}
          </div>
      </center>

      </div>
    </div>

</div>

@push('js')
    <script>
        function hapus(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't delete this data",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#696cff',
                cancelButtonColor: '#ff3e1d',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    location.href="{{url('delete/branch-assigntment')}}/"+id; 
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
            }
    </script>
@endpush
@endsection