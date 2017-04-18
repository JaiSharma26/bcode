<?php

/*
* Authentication helper
*
*
*/
function nologin($redirect_url) {
		$CI =& get_instance();
		$CI->load->library("session");
		if($CI->session->userdata('uid') == '' || empty($CI->session->userdata('uid'))) {
			redirect($redirect_url); exit();
		} //endif
}


?>