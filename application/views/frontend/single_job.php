<div class="container">

<div class="col-md-12">

	<p class="title">
		<h2><?php echo $job->title; ?></h2>
	</p>
	<hr/>
	<p class="description">
		<label>Description:</label><br/>
		<?php echo $job->description; ?>
	</p>
	<p class="skills">
		<label>Skills Required:</label><br/>
		<?php echo implode(',',json_decode($job->skills)); ?>
	</p>

	<a href="#" class="btn btn-primary">Apply</a>
	<a href="#" class="btn btn-primary">Add to Wishlist</a>
</div>

<!---- apply on job ------>

	<div class="col-md-12">

	<form action="" method="post">
	<input type="hidden" name="jobid" value="<?php echo $this->uri->segment(3); ?>">
		<div class="form-group">
			<label>Proposal</label>
			<textarea name="proposal" class="form-control" placeholder="Enter Your Proposal ....."></textarea>
		</div>
		<div class="form-group">
			<label>Fee Amount</label>
			<input type="text" class="form-control" name="bid_amount" placeholder="Your Fees .....">
		</div>

		<div class="form-group">
			<button id="submit-proposal" class="btn btn-primary" type="Submit">Submit</button>
		</div>

	</form>

	</div>

<!----(end)apply on job ------>



</div>