<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PenggunaModel;
use Exception;

class Pengguna extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Pengguna',
            'breadcrumb' => 'Pengguna'
        ];

        return view('admin/pengguna', $data);
    }

    public function get(){
        $model = new PenggunaModel();
        $post = $this->request->getVar();

        $search_value = $post['search']['value'];
        $pagination_start = $post['start'];
        $pagination_length = $post['length'];
        $order_direction = $post['order'][0]['dir'];
        $order_column_name = $post['columns'][$post['order'][0]['column']]['data'];

        $records_total = $model->countTable();
        $records_filtered = $model->countTable($search_value);
        $data = $model->getTable(
            $search_value,
            $pagination_start,
            $pagination_length,
            $order_direction,
            $order_column_name
        );

        $result_data = [
            'draw' => $post['draw'],
            'recordsTotal' => $records_total,
            'recordsFiltered' => $records_filtered,
            'data' => $data,
        ];

        return $this->response->setJSON($result_data);
    }

    public function add()
    {
        try{
            $request = $this->request->getVar();
            $model = new PenggunaModel();

            $upload = $this->request->getFile('image');
            $fileName = $upload->getRandomName();
            $upload->move(ROOTPATH . '/public/uploads/pengguna', $fileName);

            $data = [
                'name' => $request['name'],
                'username' => $request['username'],
                'password' => password_hash($request['password'], PASSWORD_DEFAULT),
                'type_id' => $request['type'],
                'image' => $upload->getName()
            ];

            $model->insert_data($data);

            $data['msg'] = "Data berhasil ditambahkan";

            return $this->response->setJSON($data);
        }catch(Exception $e){
            $data = [
                'msg' => $e->getMessage()
            ];
            return $this->response->setJSON($data);
        }
    }

    public function edit()
    {
        try{
            $model = new PenggunaModel();

            $request = $this->request->getVar();
            $id = $request['id'];

            $data = [
                'name' => $request['name'],
                'username' => $request['username'],
                'type_id' => $request['type']
            ];

            $upload = $this->request->getFile('image');
            if ($upload->isValid() && !$upload->hasMoved()) {
                $fileName = $upload->getRandomName();
                $upload->move(ROOTPATH . '/public/uploads/pengguna', $fileName);

                $data['image'] = $upload->getName();
            }

            if(!empty($request['password']))
            {
                $data['password'] = password_hash($request['password'], PASSWORD_DEFAULT);
            }

            $model->update_data($id, $data);
             
            $data['msg'] = "Data berhasil diubah";
        }catch(Exception $e){
            $data = [
                'msg' => $e->getMessage()
            ];
        }

        return $this->response->setJSON($data);
    }

    public function data()
    {
        try{
            $request = $this->request->getVar();
            $id = $request['id'];

            $model = new PenggunaModel();

            $data = $model->get_data($id);
            $data['msg'] = "Data berhasil ditampilkan";
        }catch (Exception $e){
            $data = [
                'msg' => $e->getMessage()
            ];
        }

        return $this->response->setJSON($data);
    }

    public function delete()
    {
        try{
            $model = new PenggunaModel();

            $request = $this->request->getVar();
            $id = $request['id'];

            $model->delete_data($id);

            $data['msg'] = "Data berhasil dihapus";
        }catch (Exception $e){
            $data['msg'] = $e->getMessage();
        }

        return $this->response->setJSON($data);
    }
}
