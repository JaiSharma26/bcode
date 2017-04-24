<div id="edit-user-cont" class="container" style="max-width: 350px;">

	<div class="edit-frm">

			<div class="form-group">
				<label>Title</label>
				<input type="text" name="title" class="form-control" value="<?php echo $job->title; ?>">
			</div>
			<div class="form-group">
				<label>Skills</label>
				<input type='text' name='username' class='form-control' value='<?php echo $job->skills; ?>'>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control"><?php echo $job->description; ?></textarea>
			</div>
			<div class="form-group">
				
				<button class="btn btn-primary">Edit</button>
			</div>

	</div>


</div>