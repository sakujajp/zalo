@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
				
				   <!-- Page header -->
							<div class="page-header">
								<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
							    <div class="d-flex">
							        <div class="breadcrumb">
							            <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
							            <a href="#" class="breadcrumb-item">Đăng bài lên Fanpage</a>
							            <span class="breadcrumb-item active">Lập lịch đăng</span>
							        </div>

							        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
							    </div>

							    <div class="header-elements d-none">

							    </div>
							</div>
							</div>
							<!-- /page header -->
                    {{--  <div class="content-wrapper addMargin" style="min-height: 316px;">
						   
						    <div class="alert alert-info bg-white alert-styled-left alert-arrow-left alert-dismissible" style="border-color: #f43636 !important;">
								<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
								Tính năng đanh phát triển!!
						    </div>
					</div> --}}
					  <div class="row">
				<div class="col-md-12">
				    <div class="card">
				        <div class="card-body">
				        <input type="hidden" name="_token" value="dQQHrNFaYgJsqCsU02PY31slSNul3uKavUedLG8j">        
				        <form method="GET">
				            <div class="row">
				                <div class="col-md-2"><button class="btn btn-danger" type="button" onclick="deleteSchedulefb()"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa</button></div>
				                <div class="col-md-5">
				                    <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
				                </div><!--col-md-9-->
				                <div class="col-md-3">
				                    <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button>
				                </div>
				            </div>
				        </form>
				        </div>
				    </div>
				    </div><!--col-md-12-->
				    <div class="col-md-12">
				        <div class="card formfb">
					        <div class="card-header header-elements-inline bg-slate-800">
					            <h5 class="card-title">Danh sách lịch đăng bài lên Fanpage</h5>
					            {{ csrf_field() }}
					        </div>
					       <div class="table-responsive">
					                    <table class="table table-striped">
					                <thead>
					                    <tr>
					                        <th>
					                            <div class="form-check">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckboxfb(this)">
													
												</label>
											</div>
					                        </th>
					                        <th>ID</th>
					                        <th>Tên</th>
					                        <th>Ngày bắt đầu</th>
					                        <th>Ngày kết thúc</th>
					                        <th>Trạng thái</th>
					                        <th>Tác vụ</th>
					                    </tr>
					                </thead>
					                <tbody>
                                      @foreach($history as $row)
					                       <tr>
					                        <td>
					                       <div class="form-check form-check-inline">
											<label class="form-check-label formPostfb">
												<input type="checkbox" class="form-check-input-styled" name="selectGroup[]" data-fouc value="{{$row->id}}">
												
											</label>
										</div>
					                        </td>
					                        <td>{{$row->id}}</td>
					                        <td>{{$row->zalo_id}}</td>
					                        <td>{{$row->timestart}}</td>
					                        <td>{{$row->timeend}}</td>
					                        <td>
					                        	@if($row->stop == 0)
					                        	<span class="badge bg-success">Đang chạy..</span>
					                        	@else
					                        	<span class="badge bg-danger">Đã dừng</span>
					                        	@endif
					                        </td>
					                        <td>
					                        	@if($row->stop == 0)
					                        	<button type="button" class="btn btn-primary togglePauseBtn valuestus" onclick="updatestopv2('.togglePauseBtn')" value="{{$row->id}}" id="status" data-value="1">
									               <i class="fa fa-pause" aria-hidden="true"></i></button>
									               @else
									               <button type="button" class="btn btn-primary toggleStartBtn valuestus" onclick="updatestopv2('.toggleStartBtn')" value="{{$row->id}}" id="status" data-value="0">
									                  <i class="fa fa-play" aria-hidden="true"></i></button>
									                  @endif
					                        </td>
					                      
					                    </tr>
					                    @endforeach
					                  </tbody>
					            </table>
					            <div class="mt-1 mb-1 ml-3">
					                
					            </div>
					                    </div>
					    </div>
				    </div><!--col-md-6-->

				</div><!--row-->
			</div>
			<script>
				function updatestopv2(el){
					
				   var id=  $(el + ".valuestus").val();
				           var status =$(el + '#status').attr('data-value');
				           var _token =$('.card-header input[name="_token"]').val();
					           $.ajax({
					            url: '{{ url('postfb/updateStop') }}',
					            type: 'post',
					            dataType: 'json',
					            data: {id:id, status:status, _token:_token},
					           
					            success:function(result){
					                if(result.status == 200){
					                	location.reload();
					                     
					                     
					                }else{
					                	
					                }
					            },
					        });
				}

				function deleteSchedulefb(){
					var arr = [];
					 $('input[name="selectGroup[]"]:checked').each(function() {
				            arr.push($(this).val());
				        });
                    var _token = $('.formfb input[name="_token"]').val();
                    $.ajax({
				        url: '{{ url("postfb/deleteSchedulefb")}}',
				        dataType: 'json',
				        type: 'post',
				        contentType: 'application/x-www-form-urlencoded',
				        data: { arr:arr, _token:_token},
				        success: function( data){
						  	alertBox(data.message,"14c1d7",false,true,true);
						  	setTimeout(function(){
		                        window.location.reload();
		                     }, 1500)
				        },
				        error: function( jqXhr, textStatus, errorThrown ){
				         
				        },
				        complete: function(){
				        	
				        }
				    });
				}
			</script>

			<!-- /content area -->
			@stop


			