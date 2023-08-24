<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KonfigurasiModel;
use Exception;

class Konfigurasi extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Konfigurasi',
            'breadcrumb' => 'Konfigurasi'
        ];

        return view('admin/konfigurasi', $data);
    }

    public function data()
    {
        $model = new KonfigurasiModel();

        try{
            $result_data = $model->get_data();
            $result_data['msg'] = 'Data telah diambil';   
        }catch (Exception $e){
            $result_data['msg'] = $e->getMessage();
        }

        return $this->response->setJSON($result_data);
    }

    public function edit()
    {
        $model = new KonfigurasiModel();

        try{
            $request = $this->request->getVar();

            $data = [
                'name' => $request['name'],
                'phone' => $request['phone'],
                'instagram' => $request['instagram'],
                'facebook' => $request['facebook'],
                'email' => $request['email'],
                'address' => $request['address'],
            ];

            $upload = $this->request->getFile('logo');
            if ($upload->isValid() && !$upload->hasMoved()) {
                $fileName = $upload->getRandomName();
                $upload->move(ROOTPATH . '/public/uploads/konfigurasi', $fileName);

                $data['logo'] = $upload->getName();
            }

            $model->update_data($data);

            $data['msg'] = "Data berhasil diubah";
        }catch (Exception $e){
            $data = [
                'msg' => $e->getMessage()
            ];
        }

        return $this->response->setJSON($data);
    }
}
