@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">@lang('trans.orgnaizitions')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('trans.all_orgnaizitions')</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->

@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
						@include('partials.sessionS')
			            <div class="card mg-b-20">
			                <div class="card-header pb-0">
			                	<a href="{{route('orgnaizition.create')}}" class="btn btn-success">@lang('trans.add_orgnaizition')</a>
			                </div>
			                <div class="card-body">
			                    <div class="table-responsive">
			                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
			                            <thead>
			                                <tr>
			                                	<td>#</td>
			                                	<td>@lang('trans.name')</td>
			                                	<td>@lang('trans.edit')</td>
			                                	<td>@lang('trans.delete')</td>
			                                </tr>
			                            </thead>
			                            <tbody>
			                            	<!-- fecth data -->
			                                @foreach($orgnaizitions as $orgnaizition)
			                            		<tr>
			                                		<td>{{$orgnaizition->id}}</td>
			                                		<td>{{$orgnaizition->name}}</td>
			                                		<td>
			                                			<a href="{{route('orgnaizition.edit',$orgnaizition->id)}}" class="btn btn-info">@lang('trans.edit')</a>
			                                		</td>
			                                		<td>
			                                			<form action="{{route('orgnaizition.destroy',$orgnaizition->id)}}" method="post">
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