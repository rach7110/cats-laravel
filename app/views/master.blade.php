<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Cats Databse!</title>
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				@yield('header')
			</div>
			@yield('content')
		</div>
	</body>
</html>