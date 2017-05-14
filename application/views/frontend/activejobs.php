<div class="container">

	<div class="col-md-12">

		<?php
				$jobUrl = $this->uri->segment(2);
				foreach($activejobs as $job) {
		?>

		<div class="view-job">

			<div class="col-md-10">
					<a href="<?php echo site_url().'/dashboard/'.$jobUrl.'/'.$job->job_Id;?>">
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
			</div>

			<div class="col-md-2">
				<button class='btn btn-primary' data-jobid="<?php echo $job->job_Id; ?>">Finish Job</button>
				<br/>
				<br/>
				<button data-jobid='<?php echo $job->job_Id; ?>' class='btn btn-danger'>Cancel Job</button>
			</div>

		</div>
		<?php
			} //end foreach
		?>
</div>