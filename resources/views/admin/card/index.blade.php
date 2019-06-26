@extends('admin.layout')

@section('content')
	<form class="form-inline" action="{{route('cards.index')}}">
	  <div class="form-group mb-2 mr-2">
	    <label for="staticEmail2" class="mr-1">卡号</label>
	    <input type="text" class="form-control" name="card_number">
	  </div>		
	  <div class="form-group mb-2">
	    <label for="staticEmail2" class="mr-1">时长</label>	    
	    <select class="form-control" name="month">
	    	@foreach(App\Models\Card::$months as $k =>$v)
				<option value="{{$k}}">{{ $v }}</option>
	    	@endforeach
	    </select>
	  </div>
	  <div class="form-group mx-sm-3 mb-2">
	    <label for="inputPassword2" class="mr-1">状态</label>
	    <select name="used" class="form-control">
	    	<option value="">全部</option>
	    	<option value="0">未使用</option>
	    	<option value="1">已使用</option>
	    </select>
	  </div>
	  <button type="submit" class="btn btn-primary mb-2">查找</button>

	</form>
	<p>
		<a class="btn btn-success" href="{{route('cards.create')}}">添加</a>
		<a class="btn float-right" href="javascript:;" data-toggle="modal" data-target="#exampleModalCenter">下载文件</a>
	</p>

	<table class="table table-bordered table-hover">
		<thead>
			<th>卡号</th>
			<th>时长</th>
			<th>状态</th>
			<th>生成时间</th>
			<th>使用者</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($datas as $v)
				<tr>
					<td>{{ $v->card_number }}</td>
					<td>{{ $v->month }}个月</td>
					<td>{{ $v->used == 0? '未使用':'已使用' }}</td>
					<td>{{ $v->created_at }}</td>
					<td>{{ $v->user }}</td>
					<td>删除</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<p>{{$datas->appends(request()->query())->links()}}</p>


	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalCenterTitle">选择时长</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <select name="month" id="months" class="form-control">
	        	@foreach(App\Models\Card::$months as $k => $v)
					<option value="{{$k}}">{{$v}}</option>
	        	@endforeach
	        </select>
	      </div>
	      <div class="alert alert-danger w-75 mx-auto" style="display: none">没有数控</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
	        <button type="button" class="btn btn-primary" id="down">确定</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript">
		$(function(){
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$("#down").on('click', function(){

				//console.log('downnnn')
				let month = $("#months").val();
				//window.location.href="{{route('download.index')}}?month="+month;
				//$('#exampleModalCenter').modal('hide')
				$.ajax({
					url:"{{route('cards.index')}}",
					method:'get',
					dataType:'json',
					data:{ month : month },
					success:function(res){
						if(res.data.length > 0)
						{
							window.location.href="{{route('download.index')}}?month="+month;
							$('#exampleModalCenter').modal('hide')
						}
						else
						{
							$(".alert-danger").show();
						}
					}
				})
			})

			$("#exampleModalCenter").on('hide.bs.modal', function(e){
				$(".alert-danger").hide();
			})

			$("#months").on('change', function(){
				$(".alert-danger").hide();
			})
		})
	</script>
@endsection