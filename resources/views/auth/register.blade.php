<x-layout>
  <div class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
         <div class="card px-4 py-3 my-3 shadow-sm">
          <h2 class="text-primary text-center">Register Form</h2>
          <form method="POST" action="">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" aria-describedby="emailHelp">
              <x-error name="name"/>
            </div>
            <div class="mb-3">
              <label for="userName" class="form-label"> Username </label>
              <input type="text" class="form-control" name="username" value="{{ old('username') }}" aria-describedby="emailHelp">
              <x-error name="username"/>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" aria-describedby="emailHelp">
              <x-error name="email"/>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
              <x-error name="password"/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            {{-- <ul>
              @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
              @endforeach
            </ul> --}}
          </form>
         </div>
      </div>
    </div>
  </div>
</x-layout>