@extends('layouts.master')
@section('title', 'Course Catalogue')
@section('content')
<div class="row"> 
	<div class="container-fluid bg-primary-color course-highlight">
		<div class="row">
			<div class="container">
				<div class="col-md-7">
					<p class="course-title-big">Settings</p>            
				</div>            
			</div>
		</div>
	</div>
	<div class="container-fluid cbc profileTemp">
		<div class="row">
			<div class="container">
				<ol class="breadcrumb">
					<li><a href="http://bhudhijeevi">Home</a></li>
					<li class="active">Settings</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="container">
				<div class="col-md-3"> 
					@include('includes/admin-menu')					
				</div>
				<div class="col-md-9">
					<div class="takshaInfo">
					<ul class="">
						<li style="display: block;" class="dashboardtab profileList">
						<h3>User Management</h3>
						<div class="col-md-12">						
							<table class="table">
							  <tr>
								<th>User Id</th>
								<th>User Type</th>
								<th>Name</th>
								<th></th>
							  </tr>
							 <?php for($i=0;$i<count($name);$i++) {  ?>
							  <tr>
								<td><?php echo $name[$i]->ausrid; ?></td>
								<td><?php echo $name[$i]->TUsrRoleName; ?></td>
								<td><?php echo $name[$i]->tUsrFName.' '.$name[$i]->tUsrMName.' '.$name[$i]->tUsrLName; ?></td>
								<td><a href="">More Info</a></td>
							  </tr>
							 <?php } ?>
							  </table>
							 <?php echo $name->render(); ?>
						</div>
						
							 
						</li>
					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('page_script')
@endsection

