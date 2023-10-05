<?php

namespace App\Controllers;
class ProfilCOntroller extends BaseController
{
    public function index(){
        if($this->session->get('username')){
        $data['title'] = 'Profil';
        $data['nav_url'] = 'Profil';
        $data['profil'] = $this->user->selectData($this->session->get('userid'));
        return view('templates/header')
                . view('templates/sidebar', $data)
                . view('Profil/index', $data)
                . view('templates/footer');}
        else {
            return redirect()->to('/');
        }
    }
   

}
