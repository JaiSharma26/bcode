<?php
class Job_posts extends CI_Model {

	 public function __construct()
     {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->library('session');
     }
     //Get both active and completed jobs
     public function get() {
            return $this->db->select('job_posts.*,users.Id,users.username')
                            ->from('job_posts')
                            ->join('users', 'job_posts.customerId = users.Id', 'left')
                            ->order_by('job_posts.job_Id','desc')
                            ->get()->result();
     } //end
     //Get all active jobs
     public function getAll() {

     	return $this->db->select('job_posts.*,users.Id,users.username')
     			->from('job_posts')
     			->join('users', 'job_posts.customerId = users.Id', 'left')
                ->where(['status' =>'active'])
                ->order_by('job_posts.job_Id','desc')
     			->get()->result();
     }
     public function getSingle($id) {
     	return $this->db->select('job_posts.*,users.Id,users.username')
     			->from('job_posts')
     			->join('users', 'job_posts.customerId = users.Id', 'left')
     			->where(['job_posts.job_Id' => $id])
                ->where(['status' =>'active'])
     			->get()->row();	
     }
     //Get all jobs of perticular user
     public function getbyUser($userId, $jobid = null) {

            $this->db->select('job_posts.*,COUNT(proposal.proposal_Id) as proposals')
                                ->from('job_posts')
                        ->join('proposal','proposal.jobId = job_posts.job_Id','left')
                        //->group_by('proposal.proposal_Id')
                        ->group_by('job_posts.job_Id');
                    if($jobid != null || $jobid != '') {
                         $this->db->where(['job_posts.job_Id' => $jobid]);
                        return $query = $this->db->get()->row();
                    } else {
                         $this->db->where('job_posts.customerId = '.$userId);
                        //->or_where('proposal.proposal_Id = '.NULL)
                        $query = $this->db->order_by('job_posts.job_Id','desc')->get()->result();
                        return $query;
                    }
    }

     public function delete($id) {
     	return $this->db->where('job_Id', $id);
			  $this->db->delete('job_posts');
     }
     //Get all active proposals for job 
     public function proposals($jobid = null) {

             $this->db->select('proposal.*,users.Id as userId,users.username,job_posts.title')
                        ->from('proposal')
                        ->join('users','proposal.freelancerId = users.Id','left')
                        ->join('job_posts','job_posts.job_Id = proposal.jobId','left');
                        if($jobid != null || $jobid != '') 
                            $this->db->where('proposal.jobId',$jobid);
                        return $this->db->order_by('proposal.proposal_Id','desc')->get()->result();

     }
     //Get all active/inactive proposals for job
     public function allProposals($jobId = null) {
             return $this->db->select('proposal.*,users.Id as userId,users.username,proposal_approval.userId as approvalId, proposal_approval.approval_message as message, proposal_approval.extra_guidelines,proposal_approval.status')
                              ->from('proposal')
                              ->join('proposal_approval','proposal_approval.userId = proposal.freelancerId','left')
                              ->join('users','proposal.freelancerId = users.Id','left')
                              ->where('proposal.jobId',$jobId)
                              ->order_by('proposal.proposal_Id','desc')
                              ->get()->result();
     }

     public function activejobs() {

        return $this->db->select('job_posts.*,proposal_approval.pId,proposal_approval.status,proposal_approval.approval_message,proposal_approval.extra_guidelines,users.Id as userId, users.username')
                        ->from('job_posts')
                        ->join('proposal_approval','proposal_approval.jobId = job_posts.job_Id','left')
                        ->join('users','users.Id = proposal_approval.userId','left')
                        ->where('proposal_approval.status','approve')
                        ->where('proposal_approval.customerId',$this->session->userdata('uid'))
                        ->get()->result();

     } //end activejobs

}