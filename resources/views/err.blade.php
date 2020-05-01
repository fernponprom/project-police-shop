<!DOCTYPE html>
<html lang="en">

<head>
	<link type="text/css" rel="stylesheet" href="{{asset('/error/css/style.css')}}" />
	<title></title>
</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
				<h2>{{$msg['err']}}</h2>
			</div>
			<a href="{{$msg['route']}}">{{$msg['btn']}}</a>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
