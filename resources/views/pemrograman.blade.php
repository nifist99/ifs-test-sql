@extends('admin.content')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manu /</span> {{$name}}</h4>

    <div class="row mt-4">
      <div class="col-md-12">

        <div class="card">
          <h5 class="card-header">Soal 1 List *</h5>
          <div class="card-body">
            <code>
                
                def main():
                    
                value = 10
                n = 0
                bintang = ''
                for i in range(1,11):
                    n = value - i
                    space =' '*n
                    bintang +='*'
                    print(space+bintang)

                if __name__ == "__main__":
                main()
            </code>
            <div class="mt-3">
                <img src="{{url('assets/test/2.png')}}" width="100%" alt="">
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
  
          <div class="card">
            <h5 class="card-header">2.	Create function for checking prime number, return true for prime, false for not prime
                Note: Prime Number is 2,3,5,7,11,13, etc
                Example: isPrime(3) return true; isPrime(4) return false;
                </h5>
            <div class="card-body">
              <code>
                  
                 
                num = 3

                flag = False

                if num > 1:
                    for i in range(2, num):
                        if (num % i) == 0:
                            flag = True
                            break
                if flag:
                    print(num, "False")
                else:
                    print(num, "True")
              </code>
              <div class="mt-3">
                  <img src="{{url('assets/test/3.png')}}" width="100%" alt="">
              </div>
            </div>
          </div>
  
        </div>
      </div>


      <div class="row mt-4">
        <div class="col-md-12">
  
          <div class="card">
            <h5 class="card-header">3.	You have the following string:
                String str = “IFS Solusi Integrasi, PT”; // syntax in java
                Use your programming logic to find how many i (or I) in the string.
                The Result: 4
                
                </h5>
            <div class="card-body">
              <code>
                message = 'IFS Solusi Integrasi, PT'

                    i = message.count('i')
                    I = message.count('I')

                    print('Hitung Huruf i atau I:', i+I)
              </code>
              <div class="mt-3">
                  <img src="{{url('assets/test/5.png')}}" width="100%" alt="">
              </div>
            </div>
          </div>
  
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-12">
  
          <div class="card">
            <h5 class="card-header">4.	You have array of integer 
                int[] anArray = { 8,20,50,33,89,35,23,90,101,77,23 }; //syntax in java 
                Use your programming logic to find the greatest integer in that array and display the result
                Note: you could use any programming language you’ve known.
                The Result: 101
                
                
                </h5>
            <div class="card-body">
              <code>
                def largest(arr, n):
                    large = max(arr)
                    return large
                

                if __name__ == '__main__':
                    arr = [8,20,50,33,89,35,23,90,101,77,23 ]
                    n = len(arr)
                    print ("Largest in given array ", largest(arr, n))
              </code>
              <div class="mt-3">
                  <img src="{{url('assets/test/4.png')}}" width="100%" alt="">
              </div>
            </div>
          </div>
  
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-12">
  
          <div class="card">
            <h5 class="card-header">5.	Create function to calculate sum of Fibonacci Number based on requested sequence length. Fibonacci Number is a simple series of numbers in which the sequence of numbers is the sum of two numbers. 
                Ex: Input=7 
                Fibonacci Number = 0,1,1,2,3,5,8.
                The Result = 20
                
                
                
                </h5>
            <div class="card-body">
              <code>
                def fibonacci(n):
                    data = []
                    if n == 1:
                        data = [0]
                    else:
                        data = [0,1]
                        for i in range(1, n-1):
                            data.append(data[i-1] + data[i])
                    return data

                print(fibonacci(20))
              </code>
              <div class="mt-3">
                  <img src="{{url('assets/test/6.png')}}" width="100%" alt="">
              </div>
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