<x-layout>
    <div id="content-wrapper" class="d-flex flex-column mt-4">
        <div id="content">
            <nav class=" mb-4">
              <div>
                <form action="/logout" method="POST" class="float-right mr-2">
                  @csrf
                  <button class="px-3  text-white bg-primary border-primary ">Log out</button>
                </form>
              </div>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                            <div>
                              <p class="mt-3">{{session()->get('message')}}</p>
                             </div>
                            </div>
                        </div>

             <div class="row">
                <table class="table table-bordered ml-3 mr-3">
                    <thead>
                      <tr>
                        <th scope="col">Slug</th>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col">Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @foreach ($posts as $post)
                          <td>{{$post->slug}}</td>
                          <td>{{$post->title}}</td>
                          <td>{{$post->body}}</td>
                          <td class="">
                             <a class="btn btn-primary btn-sm col-11 mt-0" 
                                 href="/edit/{{$post->id}}" role="button">Edit</a>     
                              <form action="/delete/{{$post->id}}" method="POST" class="mt-1 mb-0 ">
                                @csrf
                                @method ('delete')  
                                  <button type="submit" class="btn btn-danger btn-sm col-11" role="button">Delete</button>
                              </form>      
                          </td>
                      </tr>
                        @endforeach
                    </tbody>
                  </table>

                    {{-- <div class="">
                        {{$posts->links()}}
                    </div> --}}
                           


        </div>
</x-layout>
     