<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    echo "Saya mencoba tanpa index.php";
  }

}
