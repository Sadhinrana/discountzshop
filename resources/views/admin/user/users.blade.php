@extends('admin.layouts.app')

@section('title')
	Client
@endsection

@section('breadcrumbhead')
	Client
	<small>Control panel</small>
@endsection

@section('breadcrumb')
	<li class="active">Client</li>
@endsection

@section('content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Client</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Client name</th>
					<th>Company</th>
					<th>Email</th>
					<th>Member Type</th>
					<th>Promotional Points</th>
					<th>Phone</th>
					<th>Town/City</th>
					<th>Account Status</th>
					<th>action</th>
				</tr>
				</thead>
				<tbody>
				@foreach($clients as $client)
					<tr id="client{{$client->id}}">
						<td>{{$client->name}}</td>
						<td>{{$client->company}}</td>
						<td>{{$client->email}}</td>
						<td>
							@if($client->membership_type->membership_type  == 0)
								Prime
							@elseif($client->membership_type->membership_type  == 1)
								Silver
							@elseif($client->membership_type->membership_type  == 2)
								Gold
							@elseif($client->membership_type->membership_type  == 3)
								Diamond
							@else
								Platinum
							@endif
						</td>
						<td>{{$client->promotional_reward_points}}</td>
						<td>{{$client->phone}}</td>
						<td>
							@if($client->city  === 0)
								Dhaka
							@endif
						</td>
						<td>
							@if($client->email_verified_at  == null)
								Not Activated
							@else
								Activated
							@endif
						</td>
						<td>
							<div class="table-data-feature">
								<a href="#" class="delete-client btn btn-danger btn-sm" data-id="{{$client->id}}">
									<i class="fa fa-trash"></i>
								</a>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

	{{-- Modal Form and Client Post --}}
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
				</div>
				<div class="modal-body">

					{{-- Form Delete Post --}}
					<input type="hidden" name="_method" value="DELETE">
					<div class="deleteContent">
						Are You sure want to delete this data?
						<span class="hidden id" style="display:none"></span>
					</div>

				</div>
				<div class="modal-footer">

					<button type="button" class="btn actionBtn" data-dismiss="modal">
						<span id="footer_action_button" class="glyphicon"></span>
					</button>

					<button type="button" class="btn btn-warning" data-dismiss="modal">
						<span class="glyphicon glyphicon"></span>close
					</button>

				</div>
			</div>
		</div>
	</div>
@endsection