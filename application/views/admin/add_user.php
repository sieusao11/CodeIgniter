<div class="content">
    <div class="container-fluid">
        <div class="row">
			<div class="col-md-12">
			    <div class="card">
				    <div class="card-header">
				       <h4 class="card-title">New Team</h4>
				    </div>
				    <div class="card-body">
					    <form class="new_team" id="new_team" enctype="multipart/form-data" action="" method="post">
							<div class="form-group">
							    <label>Full Name</label>
							    <p><?php echo form_error("fullname") ?></p>
							    <input class="form-control" type="text" name="fullname" id="team_name" value="<?php echo set_value("fullname") ?>">
							</div>
							<div class="form-group">
							    <label>Email</label>
							    <p><?php echo form_error("email") ?></p>
							    <input class="form-control" name="email" id="team_address" value="<?php echo set_value("email") ?>">
							</div>
							<div class="form-group">
							    <label>Phone Number</label>
							    <p><?php echo form_error("phone") ?></p>
							    <input class="form-control" name="phone" id="" value="<?php echo set_value("phone") ?>">
							</div>
							<div class="form-group">
							    <label>Address</label>
							    <p><?php echo form_error("address") ?></p>
							    <input class="form-control" type="text" name="address" id="" value="<?php echo set_value("address") ?>">
							</div>
						  	<div class="row">
							    <div class="form-group col-md-6">
							      	<label>Birthday</label>
							      	<p><?php echo form_error("birthday") ?></p>
							      	<input class="form-control" type="date" name="birthday" id="" value="<?php echo set_value("birthday") ?>">
							    </div>
							    <div class="form-group col-md-6">
							      	<label for="team_Leagues">Gender</label>
							      	<p><?php echo form_error("gender") ?></p>
							      	<select class="form-control" name="gender">
							      		<option></option>
							      		<option value="0"<?php echo set_select("gender", "0", (isset($data["gender"]) && $data["gender"] == 0) ? true : false) ?> >Male</option>
							      		<option value="1"<?php echo set_select("gender", "1", (isset($data["gender"]) && $data["gender"] == 1) ? true : false) ?> >Female</option>
									</select>
							    </div>
						  	</div>
							<div class="form-group">
								<label for="team_Image">Image</label>
							    <input class="form-control" type="file" name="image">
							</div>
							<div class="form-group submit_button">
								<input type="submit" name="commit" value="Save Changes" class="btn btn-primary">
							</div>
						</form>
				    </div>
			    </div>
			</div>
		</div>
    </div>
</div>