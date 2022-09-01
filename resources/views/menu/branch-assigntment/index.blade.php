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

    <div class="mb-3">
    <nav class="navbar navbar-example navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid" style="justify-content: start">
          <a class="btn btn-primary btn-sm" href="{{url('create/branch-assigntment')}}"><i class='bx bx-plus'></i>&nbsp;Tambah {{$name}}</a>
          </div>
      </nav>
    </div>

    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <h5 class="card-header">{{$name}}</h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sales Id</th>
                    <th>Branch Id</th>
                    <th>Valid_From</th>
                    <th>Valid_To</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list as $key)
                  <tr>
                    <td>{{$key->sales}}</td>
                    <td>{{$key->branch}}</td>
                    <td>{{$key->valid_from}}</td>
                    <td>{{$key->valid_to}}</td>
                    <td>
                      <a href="{{url('edit/'.Crypt::encryptString($key->id).'/branch-assigntment')}}" class="btn btn-sm btn-icon btn-warning">
                        <span class="tf-icons bx bx-edit"></span>
                      </a>
                      <a href="javascript:void(0)" onclick="hapus({{$key->id}})" class="btn btn-sm btn-icon btn-danger">
                        <span class="tf-icons bx bx-trash"></span>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="card mt-5">
          <h5 class="card-header">{{$name}}</h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sales Id</th>
                    <th>Sales Name</th>
                    <th>Branch Id</th>
                    <th>Branch Name</th>
                    <th>Valid_From</th>
                    <th>Valid_To</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list as $key)
                  <tr>
                    <td>{{$key->sales}}</td>
                    <td>{{$key->sales_name}}</td>
                    <td>{{$key->branch}}</td>
                    <td>{{$key->branch_name}}</td>
                    <td>{{$key->valid_from}}</td>
                    <td>{{$key->valid_to}}</td>
                    <td>
                      <a href="{{url('edit/'.Crypt::encryptString($key->id).'/branch-assigntment')}}" class="btn btn-sm btn-icon btn-warning">
                        <span class="tf-icons bx bx-edit"></span>
                      </a>
                      <a href="javascript:void(0)" onclick="hapus({{$key->id}})" class="btn btn-sm btn-icon btn-danger">
                        <span class="tf-icons bx bx-trash"></span>
                      </a>
                    </td>
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