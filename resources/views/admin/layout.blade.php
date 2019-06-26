<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>充值卡管理</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
	<div class="container">
		<div class="row mt-2 mx-auto">
			<div class="col">
				@yield('content')
			</div>
		</div>

	</div>
</body>
</html>