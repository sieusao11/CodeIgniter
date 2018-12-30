<nav class="navbar navbar-expand-lg " color-on-scroll="500">
  	<div class=" container-fluid  ">
	    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-bar burger-lines"></span>
		    <span class="navbar-toggler-bar burger-lines"></span>
		    <span class="navbar-toggler-bar burger-lines"></span>
	    </button>
	    <div class="collapse navbar-collapse justify-content-end" id="navigation">
	      	<span class="text-secondary">Welcome back: admin@gmail.com <?php echo $this->session->flashdata("msg"); ?></span>
		    <ul class="nav navbar-nav mr-auto">
		        <li class="nav-item">
		            <a href="#" class="nav-link" data-toggle="dropdown">
		            	<span class="d-lg-none">Dashboard</span>
		          	</a>
		        </li>
		    </ul>
	      	<ul class="navbar-nav ml-auto">
		        <li class="nav-item">
			        <a class="nav-link" href="/users/sign_out" data-method="delete">
			        	<span class="no-icon">Logout</span>
			        </a>
		        </li>
	      	</ul>
	    </div>
  	</div>
</nav>

<div class="content">
    <div class="container-fluid">
    	<div class="row">
			<div class="col-md-12">
				<div class="card">
  					<div class="card-header ">
				        <h4 class="card-title">
				          	Management Teams
				          	<a class="btn btn-primary btn-xs right" href="/sample_app/admin/users/add_users">New Team</a>
				        </h4>
  					</div>
				    <div class="card-body ">
					    <table class="table table-hover table-striped">
					      	<thead>
					            <tr>
						            <th>#</th>
						            <th>Full Name</th>
						            <th>Image</th>
						            <th>Birthday</th>
						            <th>Gender</th>
						            <th>Email</th>
						            <th>Phone Number</th>
						            <th>Address</th>
						            <th>Action</th>
					          	</tr>
					      	</thead>
					     	<tbody>
					     		<?php foreach ($data as $item) { ?>
					            <tr>
									<td><?php echo $item["id"] ?></td>
									<td><?php echo $item["fullname"] ?></td>
									<td></td>
									<td><?php echo $item["birthday"] ?></td>
									<td><?php echo $item["gender"] ?></td>
									<td><?php echo $item["email"] ?></td>
									<td><?php echo $item["phone"] ?></td>
									<td><?php echo $item["address"] ?></td>
									<td class="td-actions text-right">
									    <a class="btn btn-success btn-link btn-xs" title="Edit" href="/sample_app/admin/index/">
									    	<i class="fa fa-edit"></i>
										</a>    
										<a class="btn btn-danger btn-link btn-xs delete" title="Remove" data-id="<?php echo $item['id'] ?>"  href="#">
									      	<i class="fa fa-times"></i>
										</a>  
									</td>
								</tr>
								<?php } ?>
					        </tbody>
					    </table>
				    </div>
				</div>
			</div>
		</div>
		</div>
</div>

<div class="modal fade" id="deletePopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Delete User </h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		         	<span aria-hidden="true">&times;</span>
		        </button>
	      	</div>		
	        <div class="modal-body">
	        	Are you sure for delete this user?
	        </div>
	      	<div class="modal-footer">
		        <form action="/sample_app/admin/users/delete_user" method="POST">
		            <input type="hidden" name="id" class="id_delete">
		            <button type="submit" class="btn btn-primary">Delete</button>
		        </form>
	      	</div>
	    </div>
  	</div>
</div>

<script type="text/javascript">
	$('.delete').on('click', function(){
		var id = $(this).attr('date-id');
		$('.id_delete').val(id);
		$('#deletePopup').modal('show');
	});
</script>
