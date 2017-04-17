<div id="edit-user-cont" class="container" style="max-width: 350px;">

	<div class="edit-frm">

			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $user->name; ?>">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" readonly value="<?php echo $user->username; ?>">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control" readonly value="<?php echo $user->email; ?>">
			</div>
			<div class="form-group">
				
				<button class="btn btn-primary">Edit</button>
			</div>

	</div>


</div>