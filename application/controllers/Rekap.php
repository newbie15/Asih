<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
class Rekap extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        /* Standard Codeigniter Libraries */
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');    
    }

    public function index()
    {
        // $this->load->view('rekap.php');

        $crud = new grocery_CRUD();
        
        $crud->set_table('absensi');
        $crud->order_by('tanggal', 'desc');

        $output = $crud->render();

        $this->_example_output($output);
    }

    private function _example_output($output = null)
    {
        $this->load->view('rekap.php', $output);
    }

    public function load()
    {
        $bulan = $_POST['bulan'];

        $query = $this->db->query("
            SELECT * FROM absensi WHERE MONTH(`absensi`.tanggal) = '$bulan' 
        ");

        $i = 0;
        foreach ($query->result() as $row) {
            $d[$i][0] = $row->tanggal; // or methods defined on the 'User' class
            $d[$i][1] = $row->absensi; // or methods defined on the 'User' class
            $d[$i][2] = $row->jam_in1; // or methods defined on the 'User' class
            $d[$i][3] = $row->jam_out1; // or methods defined on the 'User' class
            $d[$i][4] = $row->jam_in2; // or methods defined on the 'User' class
            $d[$i][5] = $row->jam_out2; // or methods defined on the 'User' class

            if($row->jam_in1 != "00:00:00" && $row->jam_out2 != "00:00:00" && $row->jam_in2 != "00:00:00" && $row->jam_out2 != "00:00:00"){
                $date1 = new DateTime('2006-04-12T' . $row->jam_in1);
                $date2 = new DateTime('2006-04-12T' . $row->jam_out1);

                $date3 = new DateTime('2006-04-12T' . $row->jam_in2);
                $date4 = new DateTime('2006-04-12T' . $row->jam_out2);

                $diff1 = $date2->diff($date1);
                $diff2 = $date4->diff($date3);

                $min1 = $diff1->i;
                $min2 = $diff2->i;

                $tmin = $min1 + $min2;

                $hours = floor($tmin / 60);
                $minutes = ($tmin % 60);


                $total = $hours . ":" . $minutes;
            }else{
                $total = "--:--";
            }


            $d[$i++][6] = $total; // or methods defined on the 'User' class

        }

        $this->load->view('rekap.php');
    }

}