<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->database();
		$this->load->helper('url');

		$query = $this->db->get('karyawan');

		$output['title'] = "Absensi Harian";
		$output['daftar'] = [];
		$i = 0;
		foreach ($query->result() as $row) {
			$output['daftar'][$i++] = $row->nama;
		}

		$this->load->view('absensi',$output);
	}

	public function getclock(){
		$this->load->database();
		$this->load->helper('url');

		$nama = $_POST['nama'];
		$button = $_POST['button'];

		date_default_timezone_set("Asia/Bangkok");
		$tanggal = date("Y-m-d");
		// echo "<br>";
		$clock = date("H:i:"."00");

		switch ($button) {
			case 'masuk1':
				$query = $this->db->query("select jam_in1 from absensi where absensi = '$nama' AND tanggal = '$tanggal'");
				$data = $query->row();
				$num = $query->num_rows();
				if($num>0){
					$clock = $data->jam_in1;
				} else if ($num == 0) {
					$data = array(
						'tanggal' => $tanggal,
						'absensi' => $nama,
						'jam_in1' => $clock,
					);
					$this->db->insert('absensi', $data);
				}

				$t = explode(":",$clock);
				echo $t[0].":".$t[1];
				// echo str_replace(":00","",$clock);
				break;
			case 'istirahat':
				$query = $this->db->query("select jam_out1 from absensi where absensi = '$nama' AND tanggal = '$tanggal'");
				$data = $query->row();
				$num = $query->num_rows();
				if ($num > 0) {
					if ($data->jam_out1 == '00:00:00') {
						$query = $this->db->query("update absensi set jam_out1 = '$clock' where absensi = '$nama' AND tanggal = '$tanggal'");
					}else{
						$clock = $data->jam_out1;
					}
				} else if ($num == 0) {
				}

				$t = explode(":",$clock);
				echo $t[0].":".$t[1];
				// echo str_replace(":00", "", $clock);
				break;
			case 'masuk2':
				$query = $this->db->query("select jam_in2 from absensi where absensi = '$nama' AND tanggal = '$tanggal'");
				$data = $query->row();
				$num = $query->num_rows();
				if ($num > 0) {
					if($data->jam_in2 == '00:00:00'){
						$query = $this->db->query("update absensi set jam_in2 = '$clock' where absensi = '$nama' AND tanggal = '$tanggal'");
					}else{
						$clock = $data->jam_in2;
					}
				} else if ($num == 0) {
				}

				$t = explode(":",$clock);
				echo $t[0].":".$t[1];
				// echo str_replace(":00", "", $clock);
				break;
			case 'pulang':
				$query = $this->db->query("select jam_out2 from absensi where absensi = '$nama' AND tanggal = '$tanggal'");
				$data = $query->row();
				$num = $query->num_rows();
				if ($num > 0) {
					if ($data->jam_out2 == '00:00:00') {
						$query = $this->db->query("update absensi set jam_out2 = '$clock' where absensi = '$nama' AND tanggal = '$tanggal'");
					}else{
						$clock = $data->jam_out2;
					}
				} else if ($num == 0) {
				}

				$t = explode(":",$clock);
				echo $t[0].":".$t[1];
				// echo str_replace(":00", "", $clock);
				break;

			default:
				# code...
				break;
		}
	}

	public function load(){
		$this->load->database();
		$this->load->helper('url');

		$nama = $_POST['nama'];
		// $button = $_POST['button'];

		date_default_timezone_set("Asia/Bangkok");
		$tanggal = date("Y-m-d");

		$query = $this->db->query("select * from absensi where absensi = '$nama' AND tanggal = '$tanggal'");
		$num = $query->num_rows();
		$data = $query->row();

		if($num>0){
			echo $data->jam_in1 . "_" . $data->jam_out1 . "_" . $data->jam_in2 . "_" . $data->jam_out2;
		}else{
			echo "--:--" . "_" . "--:--" . "_" . "--:--" . "_" . "--:--";

		}
	}

}
