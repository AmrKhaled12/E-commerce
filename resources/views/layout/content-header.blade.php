<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @if(Auth::check())
              <li class="breadcrumb-item"><a href="{{route('logout')}}">Logout</a></li>
              @else
              <li class="breadcrumb-item"><a href="{{route('login')}}">Sign in</a></li>
              @endif
              <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>