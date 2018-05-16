<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	</head>
	<body>
	<!-- The message we passed from PostController will be stored in Session -->
	@if(Session::has('message'))
		<div class="error">
             <ul>
               <!-- Fetching that message -->
           	   {{ Session::get('message') }}   		 	
             </ul>
        </div>
    	@endif        
		<div class="textarea">
			<label>Your post</label>
			<form action="{{ route('createPost') }}" method="POST">
				<textarea name="post" rows="5" cols=70 placeholder="Your post"></textarea>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
				<input type="submit" name="postSubmit" value="submit">
			</form>
		</div>
		<div class="posts">
			@foreach($posts as $post)
				<p>{{ $post->body }}</p>
				<div class="info">
					<p style="font-style: italic bold;">Posted by {{ $post->user->name }} at {{ $post->created_at }}</p>
				</div>
				<div class="interaction">
					<a href="#">Like</a>
					<a href="#">Dislike</a>
					@if( Auth::user() == $post->user )
					<a href="{{ route('postDelete', ['post_id' => $post->id]) }}">Delete</a>  <!-- Here the 'post_id' has to match with $post_id in getDeletePost method -->
					@endif
				</div>
			@endforeach	
		</div>
		<div class="logOut">
			<a href="{{ route('logOut') }}">Logout</a>
		</div>
	</body>
</html>
