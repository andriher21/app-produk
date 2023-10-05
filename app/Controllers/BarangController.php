<?php

namespace App\Controllers;
use App\Models\UserModel;
class BarangController extends BaseController
{
    
    public function index()
    {
        $user= new UserModel();
        if($this->session->get('username')){
                $active_date = null;
                $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'Produk';
                        $data['nav_url'] = 'Produk';

                    $data['content_scripts'][] = '/js/barang/index.js';
                    $data['produk'] = $this->barang->selectall();
                    
                    $data['kategory'] = $this->kategory->indexData();

                    //  var_dump($data['produk']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Barang/index', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function createview()
    {
        $user= new UserModel();
        if($this->session->get('username')){
                $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'Produk';
                        $data['nav_url'] = 'Produk';

                    $data['content_scripts'][] = '/js/barang/create.js';
                    $data['kategory'] = $this->kategory->indexData();
                    
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Barang/created', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function editview($id)
    {
        $user= new UserModel();
        if($this->session->get('username')){
                $active_date = null;
                $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'Produk';
                        $data['nav_url'] = 'Produk';

                    $data['content_scripts'][] = '/js/barang/edit.js';
                    $data['kategory'] = $this->kategory->indexData();
                    $data['produk'] = $this->barang->selectwhere($id);
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Barang/edit', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function image(){
        if (is_array($_FILES)) {
            if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                $sourcePath = $_FILES['userImage']['tmp_name'];
                $temp = explode(".", $_FILES["userImage"]["name"]);
                $nama_baru = round(microtime(true)) . '.' . end($temp);
                $targetPath = "uploads/" . $nama_baru;
                $fileName = $_FILES["userImage"]["name"];
                $fileSize = $_FILES["userImage"]["size"];
                
                if($fileSize>=100000){
                    echo '<h6 class="drop-alert">Ukuran file lebih dari 100kb </h6>';
                }
                else if (!preg_match("/\.(jpg|png)$/i", $fileName) ) 
                {
                    echo '<h6 class="drop-alert">Jenis File tidak sesuai direkomdasikan jpg/png</h6>';
                }
                else if (move_uploaded_file($sourcePath, $targetPath)) {
                    echo '<img src="'.base_url('/'.$targetPath.'').'"class ="rounded mx-auto d-block" width="100px" height="100px"
                    hspace=15 accept=".jpg, .jpeg, .png" id="imgview"/>';
                 return ;
                }
            }
        }
    }

    public function createsave()
    {       
        if(!$this->validate([
            'name' => [
                'rules'=>'required|is_unique[barang.nama_barang]',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada di database',
                ]
            ],
            'kategori' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} harus dipilih',
                ]
            ],
            'hargabeli' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'hargajual' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'stok' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'foto' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ])){
            $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation

            ];
            $msg = [
                'error' =>[
                    'errorname' => $validation->getError('name'),
                    'errorkategori' => $validation->getError('kategori'),
                    'errorhargabeli' => $validation->getError('hargabeli'),
                    'errorhargajual' => $validation->getError('hargajual'),
                    'errorstok' => $validation->getError('stok'),
                ]
                ];
            return json_encode($msg);
        }
        else{
        $data = array(
            'nama' => $this->request->getVar('name'),
            'kategory' => $this->request->getVar('kategori'),
            'hargabeli' => $this->request->getVar('hargabeli'),
            'hargajual' => $this->request->getVar('hargajual'),
            'stok' => $this->request->getVar('stok'),
            'image' => $this->request->getVar('foto'),
        );

        $insert = $this->barang->insertData($data);
        $msg = [
            'sukses' =>[
                'url' => '/produk'
            ]
            ];
        return json_encode($msg);}
    }
    public function editsave()
    {
    if(!$this->validate(['name' => [
        'rules'=>'required',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
        ]
    ],
    'kategori' => [
        'rules'=>'required',
        'errors'=>[
            'required' => '{field} harus dipilih',
        ]
    ],
    'hargabeli' => [
        'rules'=>'required|numeric',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
            'numeric' => '{field} harus nomor',
        ]
    ],
    'hargajual' => [
        'rules'=>'required|numeric',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
            'numeric' => '{field} harus nomor',
        ]
    ],
    'stok' => [
        'rules'=>'required|numeric',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
            'numeric' => '{field} harus nomor',
        ]
    ],
    'foto' => [
        'rules'=>'required',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
        ]
    ],
    ])){
        $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation

            ];
            $msg = [
                'error' =>[
                    'errorname' => $validation->getError('name'),
                    'errorkategori' => $validation->getError('kategori'),
                    'errorhargabeli' => $validation->getError('hargabeli'),
                    'errorhargajual' => $validation->getError('hargajual'),
                    'errorstok' => $validation->getError('stok'),
                ]
                ];
            return json_encode($msg);
    }
    else{
        $id = $this->request->getVar('id');
        $data = array(
            'nama' => $this->request->getVar('name'),
            'kategory' => $this->request->getVar('kategori'),
            'hargabeli' => $this->request->getVar('hargabeli'),
            'hargajual' => $this->request->getVar('hargajual'),
            'stok' => $this->request->getVar('stok'),
            'image' => $this->request->getVar('foto'),
        );

       $update = $this->barang->updateData($id, $data);
       $msg = [
        'sukses' =>[
            'url' => '/produk'
        ]
        ];
    return json_encode($msg);}
    }
    public function delete()
    {
        $id = $this->request->getVar('id');
        $delete = $this->barang->deleteData($id);
        return json_encode($delete);
    }



}