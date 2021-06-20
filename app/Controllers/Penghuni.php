<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Penghuni;

class Penghuni extends Controller
{

    public function __construct()
    {
        $this->model = new M_Penghuni();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Penghuni',
            'penghuni' => $this->model->getAllData()
        ];

        echo view('template/v_header', $data);
		echo view('template/v_sidebar');
		echo view('template/v_topbar');
		echo view('Penghuni/index',$data);
		echo view('template/v_footer');
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'nama_penghuni' => 'required',
                'unit' => 'required',
                'foto' => 'required',
                'no_ktp' => 'required'
            ]);

            if (!$val) {

                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Penghuni',
                    'penghuni' => $this->model->getAllData()
                ];
        
                echo view('template/v_header', $data);
                echo view('template/v_sidebar');
                echo view('template/v_topbar');
                echo view('Penghuni/index',$data);
                echo view('template/v_footer');
            }
            else  {
                $id = $this->request->getPost('id');

            $data = [
                'nama_penghuni' => $this->request->getPost('nama_penghuni'),
                'unit' => $this->request->getPost('unit'),
                'foto' => $this->request->getPost('foto'),
                'no_ktp' => $this->request->getPost('no_ktp')
            ];

            $success = $this->model->tambah($data);
            if ($success){
                session()->setFlashdata('messege', 'Ditambahkan');
                return redirect()->to('/penghuni');
            }
        }
                    
        } else {
            return redirect()->to('/penghuni');
        }
        }

    public function hapus($id)
    {
        $success = $this->model->hapus($id);
        if ($success){
            session()->setFlashdata('messege', 'Dihapus');
            return redirect()->to('/penghuni');
        }
    }

}

?>