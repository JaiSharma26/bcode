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
	} else if($this->session->userdata('type') === 'customer') {
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
				<i>Bid:: <?php echo $proposal->amount; ?></i>
			</p>
			<p>
				<button class="btn btn-primary approval-btn" data-userid="<?php echo $proposal->userId; ?>">Approve</button>
				<button class="btn btn-danger reject-btn"  data-userid="<?php echo $proposal->userId; ?>">Reject</button>
				<button class="btn btn-warning msg-btn"  data-userid="<?php echo $proposal->userId; ?>">Message</button>
			</p>

			<div id="approval" class="approval-frm-cont" style="display:none;">
				<form method="post" action="" class="approval-frm">
					<input type="hidden" name="userid" value="<?php echo $proposal->userId; ?>">
					<input type="hidden" name="jobid" value="<?php echo $this->uri->segment(3); ?>">
					<input type="hidden" name="status" value="approve">
					<div class="form-group">
						<label>Approval Message(Optional)</label>
						<textarea class="form-control" name="approval_msg"></textarea>
					</div>
					<div class="form-group">
						<label>Extra Guidlines(Optional)</label>
						<textarea class="form-control" name="extra_guidlines"></textarea>
					</div>
					<div class="form-group">
					<input type="submit" name="approve" value="Approve" class="btn btn-primary">
					</div>

				</form>
			</div>

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