<?php namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\BrsModel;
use App\Models\UsersModel;

class Users extends BaseController{
    public function index()
    {
        echo view("template/v_header");
        echo view("template/v_sidebar");
        echo view("template/v_topbar");
        echo view("template/v_js");
        echo view("template/v_css");
        //echo "Ini adalah Controller HOME";
        $model = new UsersModel();
        if (session()->get('logged_in')) {
            $data['user'] = $model->orderBy('nmr_induk', 'DESC')->findAll();
            return view('users_view_all', $data);
        } elseif (!session()->get('logged_in')) {
            (session()->setFlashdata('msg', 'Anda tidak mempunyai akses'));
            return redirect()->to(base_url());
            # code...
        }
        //load seluruh data
    }
    public function create() {
        echo view("template/v_header");
        echo view("template/v_js");
        return view('form_regist');
    }
    public function store(){
        echo view("template/v_header");
		echo view("template/v_sidebaradmin");
		echo view("template/v_topbar");
        echo view("template/v_js");
        echo view("template/v_css");
        
        $model = new UsersModel();

        $data = [
            'nmr_induk' => $this->request->getVar('nmr_induk'),
            'nama' => $this->request->getVar('nama'),
            'kategori'=> $this->request->getVar('kategori'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];
        $save = $model->insert($data);

        return redirect()->to(base_url('home'));
    }
    public function edit($id = null){
        echo view("template/v_header");
		echo view("template/v_sidebaradmin");
		echo view("template/v_topbar");
        echo view("template/v_js");
        echo view("template/v_css");

        $model = new UsersModel();
        $data['user'] = $model->where('id',$id)->first();

        return view('users_edit_user',$data);
    }
    public function update(){
        $model=new UsersModel();
        $id=$this->request->getVar('id');
        $data=[
            'nama'=>$this->request->getVar('nama'),
            'email'=>$this->request->getVar('email'),
            'nmr_induk'=>$this->request->getVar('nmr_induk'),
            'password' =>$this->request->getVar('password'),
        ];
        $save=$model->update($id,$data);

        return redirect()->to(base_url('admin/list'));          
    }
    public function editdosen($id)
    {

        $session = session();
        echo view("template/v_header");
        echo view("template/v_sidebardosen");
        echo view("template/v_topbar");
        echo view("template/v_js");
        echo view("template/v_css");
        $model = new UsersModel();
        if (session()->get('logged_in')) {
            $data['user'] = $model->where('id', $id)->first();
            return view('dosen_edit', $data);
        } elseif (!session()->get('logged_in')) {
            (session()->setFlashdata('msg', 'Anda tidak mempunyai akses'));
            return redirect()->to(base_url());
            # code...
        }
    }
    public function delete($id = null){
            $model = new UsersModel();
            $data['user'] = $model->where('id',$id)->delete();

            return redirect()->to(base_url('admin/list'));
        }
    }

?>
