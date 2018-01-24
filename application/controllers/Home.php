<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller{

      public function __construct()
      {
        parent::__construct();
        $this->auth->authPkms();
        $this->load->model('ukes/loadukes');
        $this->load->model('rekap/Dataload');

      }

      public function index(){
        $data['jdl']      = 'Dashbord';

        $comp['content']  = $this->load->view('pkms/content', $data, true);
        $comp['topnav']   = $this->ct_topnav();
        $comp['sidebar']  = $this->ct_sidebar();

        $this->load->view('pkms/home',$comp);

      }

      public function ct_topnav(){

        $data = array();
        return $this->load->view('pkms/topnav', $data, true);

      }

      public function ct_sidebar(){

        // $query = $this->db->query('SELECT Count(nilai_pkp.idukes_d) as jml FROM nilai_pkp WHERE nilai_pkp.rev = 1');
        // if ($query->num_rows()>0) {
        //   foreach ($query->result() as $value) {
        //     $anu = $value->jml;
        //   }
        // }
        //
        $data['jml'] = 0;
        return $this->load->view('pkms/sidebar', $data, true);

      }

      public function ct_logout(){

        $this->session->sess_destroy();
        redirect('login');

      }

    }
