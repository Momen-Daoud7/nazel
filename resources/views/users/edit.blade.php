@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">@lang('trans.users')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('trans.edit_user')</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!--  -->
				<div class="">
					<div class="col-12">
						@include('partials.errors')
						<form action="{{route('users.update',$user->id)}}" method="post">
							@csrf
							@method('PUT')
							<!-- start name filed -->
							<div class="form-group">
		                            <label for="name">@lang('trans.name')</label>
		                            <input type="text" name="name" class="form-control" required value="{{$user->name}}">
		                    </div>
		                    <!--/ End name filed -->

		                    <!-- start phone filed -->
		                    <div class="form-group ">
		                        <label for="phone" class="col-md-4 col-form-label text-md-right">@lang('trans.phone')</label>
		                         <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone">
		                           	@error('phone')
		                               	<span class="invalid-feedback" role="alert">
		                                     <strong>{{ $message }}</strong>
		                                </span>
		                           @enderror
		                     </div>
		                     <!-- /end phone filed -->

		                     <!-- start orgnaizition filed -->
							<div class="form-group">
								<label>@lang('trans.choose_orgnaizition')</label>
	                           	<select name="orgnaizition" class="form-control" required>
	                                <option selected value="{{$user->orgnaizition}}">{{$user->orgnaizition_id->name}}</option>
	                                @foreach($orgnaizitions as $orgnaizition)
	                                    <option value="{{$orgnaizition->id}}">{{$orgnaizition->name}}</option>
	                                @endforeach
	                            </select>
	                           	@error('orgnaizition')
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
	                        </div>
	                        <!-- / End orgnaizition filed -->

	                        <!-- start branches filed -->
	                        <div class="form-group">
	                        	<label>@lang('trans.choose_branch')</label>
	                            <select name="branch" class="form-control" required>
	                                <option selected value="{{$user->branch}}">{{$user->branch_id->name}}</option>
	                                @foreach($branches as $branch)
	                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
	                                @endforeach
	                            </select>
	                            @error('barnch')
	                                <span class="invalid-feedback" role="alert">
	                                 	<strong>{{ $message }}</strong>
	                                </span>
	                            @enderror
	                        </div>
	                        <!-- /end branches filed -->

	                        <!-- start status filed -->
	                         <div class="form-group">
	                        	<label for="status">@lang('trans.status')</label>
	                        	<select class="form-control" name="status" id="status">
	                                 <option selected disabled value="{{$user->status}}">
	                                 	@if($user->status == 'active')
			                                	@lang('trans.active')
			                                @else
			                                	@lang('trans.not_active')

			                            @endif
	                                 </option>
	                                 <option value="active">@lang('trans.active')</option>
	                                 <option value="not-active">@lang('trans.not_active')</option>
	                        	</select>
	                        </div>
	                        <!-- end status filed -->

	                        <!-- start password filed -->
	                        <div class="form-group ">
	                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('trans.password')</label>

	                            <div class="col-md-6">
	                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{$user->password}}">

	                                @error('password')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>
							<!-- / End password filed-->

							<button type="submit" class="btn btn-success">@lang('trans.edit_user')</button>
						</form>
					</div>
				</div>
				<!--  closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection