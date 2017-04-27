<div class="container">

	<div class="col-md-12">

	<?php
			$jobUrl = $this->uri->segment(2);
			foreach($jobs as $job) {
				if($job->status === 'active') {
					$css = 'active';
				} else {
					$css = 'red';
				}
	?>
		<div class="view-job <?php echo $css; ?>">
			<a href="<?php echo $jobUrl.'/'.$job->job_Id;?>">
			<p class="job-title">
				<strong><?php echo $job->title; ?></strong>
			</p>
			</a>
			<p>
				<?php echo $job->description; ?>
			</p>
			<p>
				<i><strong>Skills Required:</strong>   <?php echo implode(',',json_decode($job->skills)); ?></i>
			</p>
			<?php
				//echo '<pre>'; print_r($job); die;
				//if((!empty($job->proposals)) || ($job->proposals != '')) {
				if($this->session->userdata('type') === 'customer') {
			?>
			<p>
				<strong>Proposals:</strong>  <?php echo ($job->proposals != '') ? $job->proposals : 0; ?>
			</p>
			<?php					
				}
			?>


		</div>
	<?php
			} //endforeach
	?>

	</div>

</div>