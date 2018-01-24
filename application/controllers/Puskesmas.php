<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

    class Puskesmas extends CI_Controller{

      public function index()
      {

        $this->load->model('mdl_autpkms');
        $this->mdl_autpkms->md_autpkms();

        $data['jdl']      = 'Dashbord';

        $comp['content']  = $this->load->view('puskesmas/content', $data, true);
        $comp['topnav']   = $this->ct_topnav();
        $comp['sidebar']  = $this->ct_sidebar();

        $this->load->view('puskesmas/home',$comp);

      }

      public function ct_topnav()
      {

        $data = array();
        return $this->load->view('puskesmas/topnav', $data, true);

      }

      public function ct_sidebar()
      {

        $query = $this->db->query('SELECT Count(nilai_pkp.idukes_d) as jml FROM nilai_pkp WHERE nilai_pkp.rev = 1');
        if ($query->num_rows()>0)
        {
          foreach ($query->result() as $value)
          {
            $anu = $value->jml;
          }
        }

        $data['jml'] = $anu;
        return $this->load->view('puskesmas/sidebar', $data, true);

      }

      public function ct_logout()
      {

        $this->session->sess_destroy();
        redirect('puskesmas/Ctrl_lgnpkms');

      }

    }
