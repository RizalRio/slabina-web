<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AuthModel;
use Exception;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];

        return view('admin/auth', $data);
    }

    public function auth()
    {
        try{
            $session = session();
            $model = new AuthModel();

            $request = $this->request->getVar();
            $data = $model->search($request['username']);
            if($data){
                $password = $data['password'];
                $verify = password_verify($request['password'], $password);

                if($data['deleted'] == 1){
                    $session->setFlashdata('msg', 'Akun telah dihapus');
                    return redirect()->to('/admin');
                }

                if($data['active'] == 0){
                    $session->setFlashdata('msg', 'Akun belum diaktifkan');
                    return redirect()->to('/admin');
                }

                if($verify){
                    $sessionData = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'username' => $data['username'],
                        'type' => $data['type_id'],
                        'image' => $data['image']
                    ];

                    $session->set('auth', $sessionData);
                    return redirect()->to('/admin/dashboard');
                }else{
                    $session->setFlashdata('msg', 'Password Salah, Silahkan cek ulang');
                    return redirect()->to('/admin');
                }
            }else{
                $session->setFlashdata('msg', 'User Tidak Ditemukan');
                return redirect()->to('/admin');
            }
        }catch (Exception $e){
            $session->setFlashdata('msg', $e->getMessage());
            return redirect()->to('/admin');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/admin');
    }
}
