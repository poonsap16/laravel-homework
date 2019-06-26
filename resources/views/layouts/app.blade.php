<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>

    @if(Auth::user())
  
	    <form action="{{ url('logout') }}" method="POST">
		    <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-sm-12" align="right"></br>
                <input type="submit" name="submit" value="Logout">
            </div>
	    </form>
	@endif

    <p>
        @yield('content')
    </p>

    <footer>
        @yield('footer')
    </footer>
</body>
</html>