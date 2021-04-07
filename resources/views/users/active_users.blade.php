@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">@lang('trans.users')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('trans.active_users') </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
			            <div class="card mg-b-20">
			                <div class="card-header pb-0">
			                	<a href="{{route('users.create')}}" class="btn btn-success">@lang('trans.add_user')</a>
			                </div>
			                <div class="card-body">
			                    <div class="table-responsive">
			                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
			                            <thead>
			                                <tr>
			                                	<td>#</td>
			                                	<td>@lang('trans.name')</td>
			                                	<td>@lang('trans.phone')</td>
			                                	<td>@lang('trans.status')</td>
			                                	<td>@lang('trans.edit')</td>
			                                	<td>@lang('trans.delete')</td>
			                                </tr>
			                            </thead>
			                            <tbody>
											<!-- fecth data -->
			                                @foreach($users as $user)
			                            		<tr>
			                            			<td>{{$user->id}}</td>
			                                		<td>{{$user->name}}</td>
			                                		<td>{{$user->phone}}</td>
			                                		<td>@lang('trans.active')</td>
			                                		<td>
			                                			<a href="{{route('users.edit',$user->id)}}" class="btn btn-info">@lang('trans.edit')</a>
			                                		</td>
			                                		<td>
			                                			<form action="{{route('users.destroy',$user->id)}}" method="post">
			                                				@csrf
			                                				@method('DELETE')
			                                				<button type="submit" class="btn btn-danger">@lang('trans.delete')</button>
			                                			</form>
			                                		</td>
			                            		</tr>
			                                @endforeach
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			            </div>
			        </div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection