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
          <a class="btn btn-primary btn-sm" href="{{url('create/sales-transaction')}}"><i class='bx bx-plus'></i>&nbsp;Tambah {{$name}}</a>
          </div>
      </nav>
    </div>

    <div class="row">
      <h1>Display the sum of sales amount for each sales name</h1>
      @foreach($sum as $s)
      <div class="col-lg-4 col-md-12 col-4 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img
                  src="{{url('assets/img/icons/unicons/wallet-info.png')}}"
                  alt="Credit Card"
                  class="rounded"
                />
              </div>
            </div>
            <span>{{$s['sales_name']}} or {{$s['sales_id']}}</span>
            <h3 class="card-title text-nowrap mb-1">{{number_format($s['amount'])}}</h3>
          </div>
        </div>
      </div>

      @endforeach

    </div>

    <div class="row">
      <h1>Who has the maximum sales amount, how much and on what date.</h1>
      <div class="col-lg-4 col-md-12 col-4 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img
                  src="{{url('assets/img/icons/unicons/wallet-info.png')}}"
                  alt="Credit Card"
                  class="rounded"
                />
              </div>
            </div>
            <span>{{($max[0]['sales_name'])}}</span>
            <h3 class="card-title text-nowrap mb-1">{{number_format($max[0]['sales_amount'])}}</h3>
            <small>{{($max[0]['sales_date'])}}</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <h1>Who has the maximum sales amount on each month and how much.</h1>
      @foreach($month as $m)
      <div class="col-lg-4 col-md-12 col-4 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img
                  src="{{url('assets/img/icons/unicons/wallet-info.png')}}"
                  alt="Credit Card"
                  class="rounded"
                />
              </div>
            </div>
            <span>{{$m['name']}} or {{$m['sales_id']}}</span>
            <h3 class="card-title text-nowrap mb-1">{{number_format($m['amount'])}}</h3>
            <small>{{$m['date']}}</small>
          </div>
        </div>
      </div>

      @endforeach

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
                    <th>Sales Amount</th>
                    <th>Sales Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list as $key)
                  <tr>
                    <td>{{$key->sales}}</td>
                    <td>{{$key->sales_amount}}</td>
                    <td>{{$key->sales_date}}</td>
                    <td>
                      <a href="{{url('edit/'.Crypt::encryptString($key->id).'/sales-transaction')}}" class="btn btn-sm btn-icon btn-warning">
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
                    location.href="{{url('delete/sales-transaction')}}/"+id; 
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