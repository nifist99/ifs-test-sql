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
          <h5 class="card-header">{{$name}} Number 3.	Create SELECT statement to get the list of all sales and their manager name.</h5>
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


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header">{{$name}} Number 4.	Select  1  from sales where 1=1 ; will result:</h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sales Id</th>
                    <th>Sales Name</th>
                    <th>Manager Id</th>
                    <th>Join Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$soal4->sales_id}}</td>
                    <td>{{$soal4->sales_name}}</td>
                    <td>{{$soal4->manager}}</td>
                    <td>{{$soal4->join_date}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card">
          <h5 class="card-header">{{$name}} Number 5.	Select  *  from sales where 1=2; will result:</h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sales Id</th>
                    <th>Sales Name</th>
                    <th>Manager Id</th>
                    <th>Join Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($soal5 as $s5)
                  <tr>
                    <td>{{$s5->sales_id}}</td>
                    <td>{{$s5->sales_name}}</td>
                    <td>{{$s5->manager}}</td>
                    <td>{{$s5->join_date}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="row mt-4">
      <div class="col-md-12">

        <div class="card">
          <h5 class="card-header">{{$name}} 6.	Select  *  from branch where branch_id = ‘P00%’; will result:</h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>branch_id</th>
                    <th>branch_name</th>
                    <th>branch_category</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($soal6 as $s6)
                  <tr>
                    <td>{{$s6->branch_id}}</td>
                    <td>{{$s6->branch_name}}</td>
                    <td>{{$s6->category}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">

        <div class="card">
          <h5 class="card-header">{{$name}} 7.	Select  *  from branch where branch_id like ‘P00%’; will result:</h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>branch_id</th>
                    <th>branch_name</th>
                    <th>branch_category</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($soal7 as $s7)
                  <tr>
                    <td>{{$s7->branch_id}}</td>
                    <td>{{$s7->branch_name}}</td>
                    <td>{{$s7->branch_category}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">

        <div class="card">
          <h5 class="card-header">{{$name}} 8.	Define keys for each table above</h5>
          <div class="card-body">
           <ol>
            <li>soal 4 use id from tabel sales get one data</li>
            <li>soal 5 use id from tabel sales but select all data</li>
            <li>soal 6 use brance_id from tabel branch and use where branch_id</li>
            <li>soal 7 use brance_id from tabel branch and use where like branch_id</li>
           </ol>
          </div>
        </div>

      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">

        <div class="card">
          <h5 class="card-header">{{$name}} 9.	Draw ERD diagram for these tables: sales , branch, branch_category, branch_assignment and sales_transaction</h5>
          <div class="card-body">
            <img src="{{url('assets/diagram.jpg')}}" width="100%" alt="">
          </div>
        </div>

      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">

        <div class="card">
          <h5 class="card-header">{{$name}} 10.	Define any validation needed to prevent invalid data is entered to table branch_assignment</h5>
          <div class="card-body">
            <ol>
              <li>coloumn valid to must use Year 2999, states that the employees are still working in the company, and year 2010 states that employee has been resigned.</li>
              <li>And coulumn sales_id and branch_id not null</li>
            </ol>
          </div>
        </div>

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