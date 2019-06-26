@extends('admin.layout')

@section('content')
<h2>添加卡号</h2>
	<form action="{{route('cards.store')}}" method="post">
		<div class="form-group col-6">
			<label for="">时长</label>
			<select name="month" class="form-control" name="month">
				@foreach(App\Models\Card::$months as $key => $v)
					<option value="{{$key}}">{{$v}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group col-6">
			<label for="">数量</label>
			<input type="number" name="count" class="form-control">
		</div>
		@csrf
		<div class="form-group col-6">
			<button class="btn btn-primary" type="submit">确定</button>
		</div>

	</form>
@endsection