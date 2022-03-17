
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eaalim| for free</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset('assets/alisalama/css/style.css');?>">
</head>
<body style="height:auto">
 
    
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://eaalim.com/wp-content/uploads/2020/07/logo_size1-1-2.png" style="width: 150px" alt="Site Logo" ><sub class="text-white" style="bottom: -0.85em"> | for free</sub>
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="text-white" href="{{route('register')}}" >Create account</a>

                    <a class="" style="
                            padding: 10px 25px;
                            color: #fff;
                            background: #b31503;
                            border: 0;
                            cursor: pointer;" 
                            href="{{route('login')}}" >
                            Login
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- main content -->
    <div class="main-content" style="height: 95vh">
        <div class="container">
            <h2 class="text-center mt-3">
                WELCOME TO <b>Eaalim</b> for free
            </h2>
            <br>
            <div class="row">
                <div class="col-md-7">
                    <h4>What is <b>Eaalim</b> for free </h4>
                    <hr>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,<br><br> remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="col-md-5">
                    <div class="bord">
                       
                        <form method="POST" class="signup" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-12">
                                <h4>Login</h4>
                            </div>
                            <label for="email" class="col-md-12 col-form-label">Phone number</label>

                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="0044 28123 3611" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label ">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control input @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12  ">
                                <button type="submit" class=" btni">
                                    {{ __('Login') }}
                                </button>

                                
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Create new account
                                </a>
                                
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content -->

 

    <footer class="text-center">
        All Rights Reseaved &copy; 2019
    </footer>



    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="<?php echo asset('assets/ali/js/code.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
    <script src="<?php echo asset('assets/ali/js/notify.js');?>"></script>
    <script>
        
    </script>



</body>
</html>
