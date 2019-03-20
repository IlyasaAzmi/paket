<?php

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();

    if($this->session->userdata('status') != "login"){
        redirect(base_url().'welcome?pesan=belumlogin');
    }

    $this->load->helper('url');
		$this->load->model('m_paket');
	}

  function index(){
		$data['santri'] = $this->db->query("select * from santri order by nis desc limit 10")->result();
		$data['asrama'] = $this->db->query("select * from asrama order by id_asrama desc limit 10")->result();
		$data['paket'] = $this->db->query("select * from paket,santri,kategori_paket where penerima_paket=nis and kategori_paket=id_kategori")->result();
		$this->load->view('admin/header');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}

  function santri(){
		$data['santri'] = $this->m_paket->get_data('santri')->result();
		$data['santri'] = $this->db->query("select * from santri,asrama where asrama=id_asrama ")->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/santri',$data);
		$this->load->view('admin/footer',$data);
	}

  function santri_add(){
		$this->load->view('admin/header');
		$this->load->view('admin/santri_add');
		$this->load->view('admin/footer');
	}

  function santri_add_act(){
    $nis = $this->input->post('nis');
    $nama_santri = $this->input->post('nama_santri');
    $alamat = $this->input->post('alamat');
    $asrama = $this->input->post('asrama');
    $this->form_validation->set_rules('nama_santri','Nama Santri','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('asrama','Asrama','required');

    if($this->form_validation->run() != false){
      $data = array(
          'nis' => $nis,
          'nama_santri' => $nama_santri,
          'alamat' => $alamat,
          'asrama' => $asrama,
      );
      $this->m_paket->insert_data($data,'santri');
      redirect('admin/santri');
    } else {
      $this->load->view('admin/header');
			$this->load->view('admin/santri_add');
			$this->load->view('admin/footer');
    }
  }

  function santri_hapus($id){
		$where = array(
			'nis' => $id
		);
		$this->m_paket->delete_data($where,'santri');
		redirect(base_url().'index.php/admin/santri');
	}

  function santri_detail($id){
		$where = array(
			'nis' => $id
		);

		$data['santri'] = $this->m_paket->detail_data($where,'santri')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/santri_detail',$data);
		$this->load->view('admin/footer');
	}

	function santri_edit($id){
		$where = array(
			'nis' => $id
		);
		$data['santri'] = $this->m_paket->edit_data($where,'santri')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/santri_edit',$data);
		$this->load->view('admin/footer');
	}

  function santri_update(){
    $nis = $this->input->post('nis');
    $nama_santri = $this->input->post('nama_santri');
    $alamat = $this->input->post('alamat');
    $asrama = $this->input->post('asrama');
    $this->form_validation->set_rules('nama_santri','Nama Santri','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('asrama','Asrama','required');

    if($this->form_validation->run() != false){
      $data = array(
          'nama_santri' => $nama_santri,
          'alamat' => $alamat,
          'asrama' => $asrama
      );
      $where = array(
          'nis' => $nis
      );
      $this->m_paket->update_data($where,$data,'santri');
      redirect('admin/santri');
    } else {
      $where = array(
				'nis' => $nis
			);
			$data['santri'] = $this->m_rental->edit_data($where,'santri')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/santri_edit',$data);
			$this->load->view('admin/footer');
    }
  }

  function paket(){
		$data['santri'] = $this->db->query("select * from santri,asrama where asrama=id_asrama")->result();
    $data['paket'] = $this->db->query("select * from paket,santri,kategori_paket where penerima_paket=nis and kategori_paket=id_kategori")->result();
		$data['detail_paket'] = $this->m_paket->get_data_paket(); 
		$this->load->view('admin/header');
		$this->load->view('admin/paket',$data);
		$this->load->view('admin/footer');
	}

	function paket_add(){
		$w = array('status_paket'=>'1');
		$data['santri'] = $this->m_paket->get_data('santri')->result();
		$data['kategori'] = $this->m_paket->get_data('kategori_paket')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/paket_add',$data);
		$this->load->view('admin/footer');
	}

	function paket_add_act(){
		$nama_paket = $this->input->post('nama_paket');
		$kategori_paket = $this->input->post('kategori_paket');
		$penerima_paket = $this->input->post('penerima_paket');
		$pengirim_paket = $this->input->post('pengirim_paket');
		$isi_paket_disita = $this->input->post('isi_paket_disita');

		$this->form_validation->set_rules('nama_paket','Nama Paket','required');
		$this->form_validation->set_rules('kategori_paket','Kategori Paket','required');
		$this->form_validation->set_rules('penerima_paket','Penerima Paket','required');
		$this->form_validation->set_rules('pengirim_paket','Pengirim Paket','required');

		if($this->form_validation->run() != false){
			$data = array(
				'staf' => $this->session->userdata('id'),
				'nama_paket' => $nama_paket,
				'penerima_paket' => $penerima_paket,
				'kategori_paket' => $kategori_paket,
				'tanggal_diterima' => date('Y-m-d'),
				'pengirim_paket' => $pengirim_paket,
				'isi_paket_disita' => $isi_paket_disita,
				'status_paket' => '0',
			);
			$this->m_paket->insert_data($data,'paket');

			// update status mobil yg di pinjam
			// $d = array(
			// 	'mobil_status' => '2'
			// );
			// $w = array(
			// 	'mobil_id' => $mobil
			// );
			// $this->m_rental->update_data($w,$d,'mobil');

			redirect(base_url().'admin/paket');
		}else{
			// $w = array('mobil_status'=>'1');
			// $data['mobil'] = $this->m_rental->edit_data($w,'mobil')->result();
			$data['santri'] = $this->m_paket->get_data('santri')->result();
			$this->load->view('admin/header');
			$this->load->view('admin/paket_add',$data);
			$this->load->view('admin/footer');
		}
	}

	function paket_hapus($id){
		$w = array(
			'id_paket' => $id
		);
		$data = $this->m_paket->edit_data($w,'paket')->row();

		// $ww = array(
		// 	'mobil_id' => $data->transaksi_mobil
		// );
		// $data2 = array(
		// 	'mobil_status' => '1'
		// );
		// $this->m_paket->update_data($ww,$data2,'mobil');

		$this->m_paket->delete_data($w,'paket');
		redirect(base_url().'admin/paket');
	}

	function paket_diambil($id){
		$data['santri'] = $this->m_paket->get_data('santri')->result();
		$data['kategori'] = $this->m_paket->get_data('kategori_paket')->result();
		$data['paket'] = $this->db->query("select * from paket,santri,kategori_paket where penerima_paket=nis and kategori_paket=id_kategori and id_paket='$id'")->result();
		$this->load->view('admin/header');
		$this->load->view('admin/paket_diambil',$data);
		$this->load->view('admin/footer');
	}

	function paket_diambil_act(){
		$id_paket = $this->input->post('id_paket');
		$nama_paket = $this->input->post('nama_paket');
		$tanggal_diterima = $this->input->post('tanggal_diterima');
		$kategori_paket = $this->input->post('kategori_paket');
		$penerima_paket = $this->input->post('penerima_paket');
		$pengirim_paket = $this->input->post('pengirim_paket');
		$isi_paket_disita = $this->input->post('isi_paket_disita');
		$staf = $this->input->post('staf');

		$this->form_validation->set_rules('nama_paket','Nama Paket','required');

		if($this->form_validation->run() != false){

			// update status paket
			$data = array(
				'staf_ambil' => $this->session->userdata('id'),
				'tanggal_diambil' => date('Y-m-d'),
				'status_paket' => '1',
			);
			$w = array(
				'id_paket' => $id_paket
			);

			$this->m_paket->update_data($w,$data,'paket');

			redirect(base_url().'admin/paket');
		}else{
			$data['santri'] = $this->m_paket->get_data('santri')->result();
			$data['kategori'] = $this->m_rental->get_data('kategori_paket')->result();
			$data['paket'] = $this->db->query("select * from paket,santri,kategori_paket where penerima_paket=nis and kategori_paket=id_kategori and id_paket='$id'")->result();
			$this->load->view('admin/header');
			$this->load->view('admin/paket_diambil',$data);
			$this->load->view('admin/footer');
		}
	}

  function asrama(){
		$data['asrama'] = $this->m_paket->get_data('asrama')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/asrama',$data);
		$this->load->view('admin/footer');
	}

  function asrama_add(){
		$this->load->view('admin/header');
		$this->load->view('admin/asrama_add');
		$this->load->view('admin/footer');
	}

  function asrama_add_act(){
    $nama_asrama = $this->input->post('nama_asrama');
    $gedung = $this->input->post('gedung');

		$this->form_validation->set_rules('nama_asrama','Asrama','required');
		$this->form_validation->set_rules('gedung','Gedung','required');

    if($this->form_validation->run() != false){
      $data = array(
          'nama_asrama' => $nama_asrama,
          'gedung' => $gedung,
      );
      $this->m_paket->insert_data($data,'asrama');
      redirect('admin/asrama');
    } else {
      $this->load->view('admin/header');
			$this->load->view('admin/asrama_add');
			$this->load->view('admin/footer');
    }

  }

  function asrama_hapus($id){
		$where = array(
			'id_asrama' => $id
		);
		$this->m_paket->delete_data($where,'asrama');
		redirect(base_url().'index.php/admin/asrama');
	}

  function asrama_edit($id){
		$where = array(
			'id_asrama' => $id
		);
		$data['asrama'] = $this->m_paket->edit_data($where,'asrama')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/asrama_edit',$data);
		$this->load->view('admin/footer');
	}

  function asrama_update(){
    $id_asrama = $this->input->post('id_asrama');
    $nama_asrama = $this->input->post('nama_asrama');
    $gedung = $this->input->post('gedung');
    $data = array(
        'nama_asrama' => $nama_asrama,
        'gedung' => $gedung,
    );
    $where = array(
        'id_asrama' => $id_asrama
    );
    $this->m_paket->update_data($where,$data,'asrama');
    redirect('admin/asrama');
  }

  function kategori(){
		$data['kategori'] = $this->m_paket->get_data('kategori_paket')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/kategori',$data);
		$this->load->view('admin/footer');
	}

  function kategori_add(){
		$this->load->view('admin/header');
		$this->load->view('admin/kategori_add');
		$this->load->view('admin/footer');
	}

  function kategori_add_act(){
    $id_kategori = $this->input->post('id_kategori');
    $nama_kategori = $this->input->post('nama_kategori');
    $data = array(
        'id_kategori' => $id_kategori,
        'nama_kategori' => $nama_kategori,
    );
    $this->m_paket->insert_data($data,'kategori_paket');
    redirect('admin/kategori');
  }

  function kategori_hapus($id){
		$where = array(
			'id_kategori' => $id
		);
		$this->m_paket->delete_data($where,'kategori_paket');
		redirect(base_url().'index.php/admin/kategori');
	}

  function kategori_edit($id){
		$where = array(
			'id_kategori' => $id
		);
		$data['kategori'] = $this->m_paket->edit_data($where,'kategori_paket')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/kategori_edit',$data);
		$this->load->view('admin/footer');
	}

  function kategori_update(){
    $id_kategori = $this->input->post('id_kategori');
    $nama_kategori = $this->input->post('nama_kategori');
    $data = array(
        'nama_kategori' => $nama_kategori,
    );
    $where = array(
        'id_kategori' => $id_kategori
    );
    $this->m_paket->update_data($where,$data,'kategori_paket');
    redirect('admin/kategori');
  }

  function user(){
		$data['user'] = $this->m_paket->get_data('user')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/user',$data);
		$this->load->view('admin/footer');
	}

  function user_add(){
		$this->load->view('admin/header');
		$this->load->view('admin/user_add');
		$this->load->view('admin/footer');
	}

  function user_add_act(){
    $id_user = $this->input->post('id_user');
    $nama_user = $this->input->post('nama_user');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $role = $this->input->post('role');
    $data = array(
        'id_user' => $id_user,
        'nama_user' => $nama_user,
        'username' => $username,
        'password' => $password,
        'role' => $role,
    );
    $this->m_paket->insert_data($data,'user');
    redirect('admin/user');
  }

  function user_hapus($id){
		$where = array(
			'id_user' => $id
		);
		$this->m_paket->delete_data($where,'user');
		redirect(base_url().'index.php/admin/user');
	}

  function user_edit($id){
		$where = array(
			'id_user' => $id
		);
		$data['user'] = $this->m_paket->edit_data($where,'user')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/user_edit',$data);
		$this->load->view('admin/footer');
	}

  function user_update(){
    $id_user = $this->input->post('id_user');
    $nama_user = $this->input->post('nama_user');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $role = $this->input->post('role');
    $data = array(
        'nama_user' => $nama_user,
        'username' => $username,
        'password' => $password,
        'role' => $role,
    );
    $where = array(
        'id_user' => $id_user
    );
    $this->m_paket->update_data($where,$data,'user');
    redirect('admin/user');
  }

  function role(){
		$data['role'] = $this->m_paket->get_data('role')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/role',$data);
		$this->load->view('admin/footer');
	}

  function role_add(){
		$this->load->view('admin/header');
		$this->load->view('admin/role_add');
		$this->load->view('admin/footer');
	}

  function role_add_act(){
    $id_role = $this->input->post('id_role');
    $nama_role = $this->input->post('nama_role');
    $menu = $this->input->post('menu');
    $data = array(
        'id_role' => $id_role,
        'nama_role' => $nama_role,
        'menu' => $menu,
    );
    $this->m_paket->insert_data($data,'role');
    redirect('admin/role');
  }

  function role_hapus($id){
		$where = array(
			'id_role' => $id
		);
		$this->m_paket->delete_data($where,'role');
		redirect(base_url().'index.php/admin/role');
	}

  function role_edit($id){
		$where = array(
			'id_role' => $id
		);
		$data['role'] = $this->m_paket->edit_data($where,'role')->result();
		$this->load->view('admin/header');
		$this->load->view('admin/role_edit',$data);
		$this->load->view('admin/footer');
	}

  function role_update(){
    $id_role = $this->input->post('id_role');
    $nama_role = $this->input->post('nama_role');
    $menu = $this->input->post('menu');
    $data = array(
        'nama_role' => $nama_role,
        'menu' => $menu,
    );
    $where = array(
        'id_role' => $id_role
    );
    $this->m_paket->update_data($where,$data,'role');
    redirect('admin/role');
  }

  function logout(){
    $this->session->sess_destroy();
    redirect(base_url().'welcome?pesan=logout');
  }

  function ganti_password(){
    $this->load->view('admin/header');
    $this->load->view('admin/ganti_password');
    $this->load->view('admin/footer');
  }

  function ganti_password_act(){
		$pass_baru = $this->input->post('pass_baru');
		$ulang_pass = $this->input->post('ulang_pass');
		$this->form_validation->set_rules('pass_baru','Password Baru','required|matches[ulang_pass]');
		$this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');

		if($this->form_validation->run() != false){
			$data = array(
				'password' => md5($pass_baru)
			);
			$w = array(
				'id_user' => $this->session->userdata('id')
			);
			$this->m_paket->update_data($w,$data,'user');
			redirect(base_url().'admin/ganti_password?pesan=berhasil');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/ganti_password');
			$this->load->view('admin/footer');
		}
	}

	function laporan(){
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
		$this->form_validation->set_rules('dari','Dari Tanggal','required');
		$this->form_validation->set_rules('sampai','Sampai Tanggal','required');

		if($this->form_validation->run() != false){
			$data['laporan'] = $this->db->query("select * from paket,santri,kategori_paket where penerima_paket=nis and kategori_paket=id_kategori and date(tanggal_diterima) >= '$dari'")->result();
			$this->load->view('admin/header');
			$this->load->view('admin/laporan_filter',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/header');
			$this->load->view('admin/laporan');
			$this->load->view('admin/footer');
		}
	}

	function laporan_print(){
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');

		if($dari != "" && $sampai != ""){
			$data['laporan'] = $this->db->query("select * from paket,santri,kategori_paket where penerima_paket=nis and kategori_paket=id_kategori and date(tanggal_diterima) >= '$dari'")->result();
			$this->load->view('admin/laporan_print',$data);
		}else{
			redirect("admin/laporan");
		}
	}

	function laporan_pdf(){
		$this->load->library('dompdf_gen');
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');

		$data['laporan'] = $this->db->query("select * from paket,santri,kategori_paket where penerima_paket=nis and kategori_paket=id_kategori and date(tanggal_diterima) >= '$dari'")->result();
		$this->load->view('admin/laporan_pdf', $data);

    $paper_size  = 'A4'; // ukuran kertas
		$orientation = 'landscape'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan.pdf", array('Attachment'=>0)); // nama file pdf yang di hasilkan
	}

	function laporanpdf(){
		$data = array(
        "dataku" => array(
            "nama" => "Petani Kode",
            "url" => "http://petanikode.com"
        )
    );

    $this->load->library('pdf');

    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan-petanikode.pdf";
    $this->pdf->load_view('laporanpdf', $data);
	}

	public function laporann(){
        $this->load->view('welcome_message');

        // Get output html
        $html = $this->output->get_output();

        // Load pdf library
        $this->load->library('ppdf');

        // Load HTML content
        $this->dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $this->dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }

}
