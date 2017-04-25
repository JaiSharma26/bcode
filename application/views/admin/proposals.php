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
              <th>Freelancer</th>
              <th>Proposal</th>
              <th>Amount</th>
              <th>Date Submitted</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
                    <?php
                      //echo '<pre>'; print_r($record); die;
                        $count = 1;
                        foreach($proposals as $proposal) {
                    ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $proposal->username; ?></td>
                      <td><?php echo $proposal->proposal; ?></td>
                      <td><?php echo $proposal->amount; ?></td>
                      <td><?php echo $proposal->created_at; ?></td>
                        
                      </td>
                      <td>
                        <button data-jobid="<?php echo $proposal->jobId; ?>"  class="btn btn-primary edit-proposal"><i class="fa fa-edit"></i></button>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                    <button class="btn btn-primary delete-proposal"  data-jobid="<?php echo $proposal->jobId; ?>"><i class="fa fa-trash"></i></button>           
                      </td>
                      
                    </tr>
                    <?php $count++; } //endforeach ?>

          </tbody>
      </table>

    </section>
</div>