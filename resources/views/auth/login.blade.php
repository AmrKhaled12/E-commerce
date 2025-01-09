
<html lang="en">
    @extends('layout.styles')
<body>
   
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                            {{ Session::get('error')}}
                            </div>
                        @endif
                        <form id="registrationForm" action="{{route('login')}}" method="post">
                            @csrf
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="email">
                                    Email
                                </label>
                                <input type="email"
                                        name="email" 
                                       class="form-control" 
                                       id="email" 
                                       placeholder="Email"  />
                            </div>
                            @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="password">
                                    Password
                                </label>
                                <input type="password" 
                                        name="password"
                                       class="form-control" 
                                       id="password" 
                                       placeholder="Password"
                                    />
                            </div>
                            <button type="submit" class="btn btn-danger">
                                Login
                            </button>
                        </form>
                        <p class="mt-3">
                            Not registered?
                            <a href="{{route('show-register')}}">Create an account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
