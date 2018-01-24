<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->auth->authPkms();
		$this->load->model('mutu/Dataload');
		$this->load->model('mutu/Execute');
	}

	public function index()
	{
		$data['ktgMutu'] = $this->Dataload->ktgMutu();

		$comp['content']  = $this->load->view('pkms/mutu/insert',$data, true); #load content
    $comp['jdl']      = 'Penilaian Mutu'; #judul content
    $comp['topnav']   = $this->ct_topnav(); #load topnav
    $comp['sidebar']  = $this->ct_sidebar(); #load sidebar

    $this->load->view('pkms/home',$comp);
	}

	#top navigation
  public function ct_topnav()
  {

		$data = array();
		return $this->load->view('pkms/topnav', $data, true);

	}

	public function ct_sidebar()
	{

    #cek data jika ada revisi dan menampilkan pada sidebar
    $anu = 0;

    // $query = $this->db->query('SELECT Count(nilai_pkp.idukes_d) as jml FROM nilai_pkp WHERE nilai_pkp.rev = 1');
    // if ($query->num_rows()>0) {
    //   foreach ($query->result() as $value) {
    //     $anu = $value->jml;
    //   }
    // }
    //
		$data['jml'] = $anu;
		return $this->load->view('pkms/sidebar', $data, true);

	}

	public function loadDataMutu()
	{
		$id = $this->input->post('idKtg');
		$pkms = $this->session->userdata('idpkms');
		$bln = date('m');
		$rsltCheck = 0;

		$query = $this->Dataload->cekNilaiMutu($id, $pkms, $bln);
		if ($query->num_rows()>0)
		{
			$rsltCheck = 1;
		}
		else
		{
			$rsltCheck = 0;
		}

		$data['id'] 		= $this->input->post('idKtg');
		$data['check'] 	= $rsltCheck;
		$data['pkms']		= $pkms;
		$data['bln']		= $bln;
		$result = $this->load->view('pkms/mutu/dtmutu',$data,true);
		echo $result;
	}

	public function save()
	{
		$idNilai = $this->input->post('idMtNilai');
		foreach ($idNilai as $key => $id)
		{
			if ($id == '')
			{
				$data['id_pkms']			= $this->session->userdata('idpkms');
				$data['idmt_op_htng']	= $this->input->post('idMtVar')[$key];
				$data['total']				= $this->input->post('total')[$key];
				$data['capaian']			= $this->input->post('cpaian')[$key];
				$data['cp_persen']		= $this->input->post('mtuCpain')[$key];
				$data['total_var']		= $this->input->post('totVar');
				$data['analisa']			= $this->input->post('analisa')[$key];
				$data['tndk_lnjt']		= $this->input->post('tndkLnjt')[$key];
				$data['create_date']	= date("Y-m-d h:i:sa");

				$this->Execute->insertMutu($data);
				$this->session->set_flashdata('info', 'Data berhasil ditambah');

			}
			else
			{
				$data['id_pkms']			= $this->session->userdata('idpkms');
				$data['idmt_op_htng']	= $this->input->post('idMtVar')[$key];
				$data['total']				= $this->input->post('total')[$key];
				$data['capaian']			= $this->input->post('cpaian')[$key];
				$data['cp_persen']		= $this->input->post('mtuCpain')[$key];
				$data['total_var']		= $this->input->post('totVar');
				$data['analisa']			= $this->input->post('analisa')[$key];
				$data['tndk_lnjt']		= $this->input->post('tndkLnjt')[$key];
				$data['edit_date']		= date("Y-m-d h:i:sa");

				$this->Execute->updateMutu($id, $data);
				$this->session->set_flashdata('info', 'Data berhasil dirubah');
			}
		}
	}

	public function rekap()
	{
		$data['idpkms'] = $this->session->userdata('idpkms');

		$comp['content']  = $this->load->view('pkms/mutu/dtrekap',$data, true); #load content
    $comp['jdl']      = 'Penilaian Mutu'; #judul content
    $comp['topnav']   = $this->ct_topnav(); #load topnav
    $comp['sidebar']  = $this->ct_sidebar(); #load sidebar

    $this->load->view('pkms/home',$comp);
	}

	public function viewData()
	{
		$data['idpkms'] = $this->session->userdata('idpkms');
    $data['bln'] 		= $this->input->get('date');
    $data['thn']		= $this->input->get('thn');
    $comp = array
    (
      'content' => $this->load->view('pkms/mutu/viewdt', $data, true),
      'jdl'     => 'Penilaian Mutu Bulan <i>'.$this->input->get('bln')."-".$this->input->get('thn').'</i>',
      'topnav'  => $this->ct_topnav(),
      'sidebar' => $this->ct_sidebar()
    );
    $this->load->view('pkms/home',$comp);
	}

}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */