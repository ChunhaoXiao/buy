<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<style>
		html, body {
			height: 100%;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div class="container-fluid h-100">
		
		<div class="row h-100 align-items-center justify-content-center bg-secondary text-white">
			
			<div class="col-6 h-50">
				<h3 class="text-center mb-5">管理员登录</h3>
				<form action="{{route('admin.login')}}" method="post" class="h-50">
					<div class="form-group row h-25">
						<label for="" class="col-2 col-form-label text-right">用户名</label>
						<div class="col-10">
							<input type="text" class="form-control" name="name">
						</div>
					</div>

					<div class="form-group row h-25">
						<label for="" class="col-2 col-form-label text-right">密码</label>
						<div class="col-10">
							<input type="password" class="form-control" name="password">
						</div>
					</div>
					@csrf
					<div class="form-group row h-25">
						<label for="" class="col-2 col-form-label"></label>
						<div class="col-10">
							<button class="btn btn-primary btn-lg">登录</button>
						</div>
					</div>
				</form>
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
			</div>
		</div>
	</div>
</body>
</html>