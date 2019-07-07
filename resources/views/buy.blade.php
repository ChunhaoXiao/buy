<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>会员升级</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style>
		html, body {
			height: 100%;
			box-sizing: border-box;
			margin:0 auto;
			padding: 0;
		}
	</style>
</head>
<body>
	<div class="container h-100">

		<div class="row h-100 border align-items-center">
			<div class="col-sm-12 mx-auto">
				@if(session()->has('success'))
					<div class="alert alert-success">升级成功   <a href="{{route('member.create')}}" class="alert-link">&nbsp;&nbsp;&nbsp;返回</a></div>
				@else
				<h2 class="text-center mb-5">小程序用户升级</h2>
				<form action="{{route('member.store')}}" method="post">
					<div class="form-group row mx-auto">
						<label for="" class="col-sm-3 col-form-label">用户名</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="username" placeholder="小程序中设置的用户名">
						</div>
					</div>
					<div class="form-group row mx-auto">
						<label for="" class="col-sm-3 col-form-label">卡号</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="card_number" value="{{ old('card_number') }}" placeholder="输入卡号">
						</div>
					</div>
					<div class="row mx-auto">
						<label for="" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
						<!-- <small class="float-right text-secondary">输入正确后可能需要几秒钟，请耐心等待</small> -->
					    </div>
				    </div>
					@csrf
					<div class="form-group row mx-auto">
						<label for="" class="col-sm-3 col-form-label"></label>
						<div class="col-sm-9">
							<button class="btn btn-outline-primary">提交</button>
						</div>
					</div>
				</form>
				@foreach(['username', 'card_number', 'msg'] as $v)
					@error($v)
						<div class="alert alert-danger">{{ $message }}</div>
						@break
					@enderror
				@endforeach

				@endif
			</div>
		</div>
	</div>
</body>
</html>