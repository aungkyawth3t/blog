<x-layout>
  <div class="container">
    <div class="row">
      <div class="col-md-5 mx-auto">
         <div class="card px-4 py-3 my-3 shadow-sm">
          <h2 class="text-primary text-center">Login Form</h2>
          <form method="POST" action="">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" aria-describedby="emailHelp">
              @error('email')
                <p class="text-danger"> {{ $message }} </p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
              @error('password')
                <p class="text-danger"> {{ $message }} </p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
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