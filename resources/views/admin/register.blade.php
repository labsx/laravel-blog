<x-_header>
  <body class="">
        <div class="container">
            <div class="row">
              <div class="col-md-6 offset-md-3 ">
                <div class="card my-5 ">
                  <form class="card-body cardbody-color p-lg-5 " action="/register" method="POST" >
                    @csrf
                      <div class="text-center">
                        <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                          width="200px" alt="profile">
                      </div>

                      <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                      </div>
                      <div>
                        @error('name')
                         <p style="font-size: x-small"  class="col-md-7 col-form-label text-md-right text-danger mb-3 ">{{$message}}</p>
                         @enderror
                      </div>
        
                      <div class="mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                      </div>
                      <div>
                        @error('email')
                         <p style="font-size: x-small"  class="col-md-7 col-form-label text-md-right text-danger mb-3 ">{{$message}}</p>
                         @enderror
                      </div>

                      <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                      <div>
                        @error('password')
                         <p style="font-size: x-small"  class="col-md-7 col-form-label text-md-right text-danger mb-3 ">{{$message}}</p>
                         @enderror
                        </div>

                       <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Register</button></div>
                       <div>Already have an account? <a href="/login">Log in</a></div>
                    <div>
                  </div> 
                 <div class="">
                    @if (session()->has('message'))
                            <p class="mt-3">{{session()->get('message')}}</p>  
                    @endif
                </div>
                
                </form>
               </div>
              </div>
            </div>
          </div>
</x-_header>

       
        
    