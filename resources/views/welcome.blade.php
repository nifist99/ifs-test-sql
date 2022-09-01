@extends('admin.content')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">IFS TEST {{Session::get('name')}}! 🎉</h5>
                <p class="mb-4">
                  SQL DAN RELASI DATABASE TEST
                </p>
                <h3>Link Github SQL Test</h3>

                <a href="https://github.com/nifist99/ifs-test-sql.git" target="_blank" class="btn btn-sm btn-outline-primary">https://github.com/nifist99/ifs-test-sql.git</a>
                
                <h3 class="mt-5">Link Logic Programming Test</h3>

                <a href="https://github.com/nifist99/ifs-test-logic-programming.git" target="_blank" class="btn btn-sm btn-outline-primary">https://github.com/nifist99/ifs-test-logic-programming.git</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img
                  src="{{url('assets/img/illustrations/man-with-laptop-light.png')}}"
                  height="140"
                  alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png')}}"
                  data-app-light-img="illustrations/man-with-laptop-light.png')}}"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection