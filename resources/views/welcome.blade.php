<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
	<label id="introTitle">My Project Blog</label>
        @if(count($errors) > 0)
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif    
        <div class="signUp">
           
            <label>Sign Up</label></br>
           
            <form action="{{ route('signUp') }}" method="POST" name="signUp" id="signUp">
                <label id="usernameLabelSignUp">Username</label></br>
                <input type="text" id="usernameSignUp" name="username" value="{{ Request::old('username')}}"></br>
                <label id="emailLabelSignUp">Email</label></br>
                <input type="text" id="emailSignUp" name="email" value="{{ Request::old('email')}}"></br>
                <label id="passwordLabelSignUp">Password</label></br>
                <input type="password" id="passwordSignUp" name="password"></br>            
                <input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" id="signUpSubmit" value="signUp">
            </form></br>
        
        </div>
        <div class="signIn">
            
            <label>Sign In</label>
            
            <form action="{{ route('signIn') }}" method="POST" name="signIn" id="signIn">
                <label id="usernameLabel">Username</label></br>
                <input type="text" id="username" name="username" value="{{ Request::old('username')}}"></br>
                <label id="emailLabel">Email</label></br>
                <input type="text" id="email" name="email" value="{{ Request::old('email')}}"></br>
                <label id="passwordLabel">Password</label></br>
                <input type="password" id="password" name="password"></br>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" id="signInSubmit" value="signIn">            
            </form></br>
        
        </div>
	<div class="guest">
		<a href="{{ route('guest') }}">Guest</a>
	</div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
	<label id="buildTitle">Built with Laravel 5.4</label>
	<label id="signUpContent">Please sign up to see the content</label>
    </body>
</html>
