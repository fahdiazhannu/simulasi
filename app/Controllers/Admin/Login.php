<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        
        echo view('login_index');
    }
    public function auth()
    {
        echo view("template/v_header");
        echo view("template/v_sidebar");
        echo view("template/v_topbar");
        echo view("template/v_js");
        echo view("template/v_css");

        $session = session();
        $model = new UsersModel();
        $nmr_induk = $this->request->getVar('nmr_induk');
        $password = $this->request->getVar('password');
        //akses db user
        $data = $model->where('nmr_induk', $nmr_induk)->first();
        if ($data) {
            $pass = $data['password']; //data dari db
            $nama = $data['nama'];
            $kategori = $data['kategori'];
            $verify_pass = password_verify($password, $pass);
            if ($password==$pass) {
                $sess_data = [
                    'nmr_induk'       => $data['nmr_induk'],
                    'nama'     => $data['nama'],
                    'password' => $data['password'],
                    'logged_in'     => TRUE
                ];
                $session->set($sess_data);
                if($kategori=='dosen'){
                    return redirect()->to(base_url('admin/dosen'));
                }else if($kategori=='mahasiswa'){
                    return redirect()->to(base_url('admin/dashboard'));
                }else{
                    return redirect()->to(base_url('admin/dashboard'));
                }
            } else {
                $session->setFlashdata('msg', 'Password tidak ada');
                return redirect()->to(base_url());
            }
        } else {
            $session->setFlashdata('msg', 'Nomor Induk tidak ada');
            return redirect()->to(base_url());
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
}
