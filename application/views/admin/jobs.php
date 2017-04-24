  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?php echo $breadcrumb; ?></li>
      </ol>
    </section>


     <!-- Main content -->
    <section class="content">

    	 <table class="table">

      <thead>
        <tr>
          <th>S.No</th>
          <th>Title</th>
          <th>Skills</th>
          <th>Posted By</th>
          <th>Active</th>
          <th>Action</th>

        </tr>
      </thead>
      <tbody>
        
        <?php
          //echo '<pre>'; print_r($record); die;
            $count = 1;
            foreach($jobs as $rec) {
        ?>
        <tr>
          <td><?php echo $count; ?></td>
          <td><?php echo $rec->title; ?></td>
          <td><?php echo implode(',',json_decode($rec->skills)); ?></td>
          <td><?php echo $rec->username; ?></td>
          <td><?php //echo $rec->active; ?>
            
          </td>
          <td>
            <button data-jobid="<?php echo $rec->job_Id; ?>"  class="btn btn-primary edit-job"><i class="fa fa-edit"></i></button>
            &nbsp; &nbsp; &nbsp; &nbsp;
        <button class="btn btn-primary delete-job"  data-jobid="<?php echo $rec->job_Id; ?>"><i class="fa fa-trash"></i></button>           
          </td>
        </tr>
        <?php $count++; } //endforeach ?>
      </tbody>

      </table>

	</section>
</div>