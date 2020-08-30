<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fruits extends CI_Controller {

	public function index()
	{
        $data['title'] = 'List Fruits';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('fruit/index', $data);
		$this->load->view('templates/footer');
    }
    
}
