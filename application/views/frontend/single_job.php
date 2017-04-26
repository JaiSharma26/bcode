<?php
//		echo '<pre>'; print_r($proposal); die;
?>
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

</div>

<!---- apply on job ------>

<?php
		if($this->session->userdata('type') === 'freelancer') {
?>

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
<?php
	} else {
?>
		
<!----- show proposals for job ------>
	<div class="col-md-12">

		<h4>Proposals Submitted: </h4>
		<hr/>

	<?php
			foreach($proposals as $proposal) {
	?>
		<div class="proposals-submitted">
			<p>
				<h4><?php echo $proposal->username; ?></h4><hr/>
			</p>
			<p>
				<label>Proposal:</label><br/>
				<span><?php echo $proposal->proposal; ?></span>
			</p>
			<p>
				<button class="btn btn-primary" data-userid="<?php echo $proposal->userId; ?>">Approve</button>
				<button class="btn btn-danger"  data-userid="<?php echo $proposal->userId; ?>">Reject</button>
			</p>
			<hr/>
		</div>
	<?php } //endforeach ?>

	</div>
<!----- (end)show proposals for job ----->

<?php
	} //endif
?>

<!----(end)apply on job ------>



</div>