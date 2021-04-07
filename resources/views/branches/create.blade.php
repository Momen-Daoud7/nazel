@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">@lang('trans.branches')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ @lang('trans.add_branch')</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->

@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-12">
						@include('partials.errors')
						<form action="{{route('branches.store')}}" method="post">
							@csrf
							<div class="form-group">
								<label for="name">@lang('trans.branch_name')</label>
								<input type="text" name="name" class="form-control" id="name">
							</div>
							<button type="submit" class="btn btn-success">@lang('trans.add_branch')</button>
						</form>
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