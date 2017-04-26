<?php

class Job_posts extends CI_Model {

	 public function __construct()
     {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->library('session');
     }

     public function getAll() {

     	return $this->db->select('job_posts.*,users.Id,users.username')
     			->from('job_posts')
     			->join('users', 'job_posts.customerId = users.Id', 'left')
     			->get()->result();
     }
     public function getSingle($id) {
     	return $this->db->select('job_posts.*,users.Id,users.username')
     			->from('job_posts')
     			->join('users', 'job_posts.customerId = users.Id', 'left')
     			->where(['job_posts.job_Id' => $id])
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
                        $query = $this->db->get()->result();
                        return $query;
                    }
    }

     public function delete($id) {
     	return $this->db->where('job_Id', $id);
			  $this->db->delete('job_posts');
     }
     public function proposals($jobid) {

        /*
        return $this->db->select('proposal.*,users.Id,users.username,job_posts.job_Id,job_posts.title')
                ->from('proposal')
                ->join('users', 'proposal.freelancerId = users.Id', 'left')
                ->join('job_posts', 'job_posts.job_Id = porposal.jobId', 'left')
                ->get()->result();
        */
        return $this->db->select('proposal.*,users.username,job_posts.title')
                        ->from('proposal')
                        ->join('users','proposal.freelancerId = users.Id','left')
                        ->join('job_posts','job_posts.job_Id = proposal.jobId','left')
                        ->get()->result();

     }

}