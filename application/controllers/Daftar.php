<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Daftar extends CI_Controller {
 
    function __construct() {
        parent::__construct();

 
        /* Standard Codeigniter Libraries */
        $this->load->database();
        $this->load->helper('url'); 
 
        $this->load->library('grocery_CRUD');    
    }
 
    private function _example_output($output = null) {
        $this->load->view('daftar.php',$output);    
    }

    public function index()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('karyawan');

        $output = $crud->render();

        $this->_example_output($output);
    }    

    public function offices() {
        $crud = new grocery_CRUD();
        $crud->set_table('offices');

        $output = $crud->render();
        
        $this->_example_output($output);

    }
}