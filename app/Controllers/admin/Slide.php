<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\SlideModel;
use Exception;

class Slide extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Slide',
            'breadcrumb' => 'Slide'
        ];

        return view('admin/slide', $data);
    }


    public function get()
    {
        $model = new SlideModel();
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
        try {
            $request = $this->request->getVar();
            $model = new SlideModel();

            $upload = $this->request->getFile('image');
            $fileName = $upload->getRandomName();
            $upload->move(ROOTPATH . '/public/uploads/slide', $fileName);

            $data = [
                'name' => $request['name'],
                'description' => $request['description'],
                'image' => $upload->getName()
            ];

            $model->insert_data($data);

            $data['msg'] = "Data berhasil ditambahkan";

            return $this->response->setJSON($data);
        } catch (Exception $e) {
            $data = [
                'msg' => $e->getMessage()
            ];
            return $this->response->setJSON($data);
        }
    }

    public function edit()
    {
        try {
            $model = new SlideModel();

            $request = $this->request->getVar();
            $id = $request['id'];

            $data = [
                'name' => $request['name'],
                'description' => $request['description'],
            ];

            $upload = $this->request->getFile('image');
            if ($upload->isValid() && !$upload->hasMoved()) {
                $fileName = $upload->getRandomName();
                $upload->move(ROOTPATH . '/public/uploads/slide', $fileName);

                $data['image'] = $upload->getName();
            }

            $model->update_data($id, $data);

            $data['msg'] = "Data berhasil diubah";
        } catch (Exception $e) {
            $data = [
                'msg' => $e->getMessage()
            ];
        }

        return $this->response->setJSON($data);
    }

    public function data()
    {
        try {
            $request = $this->request->getVar();
            $id = $request['id'];

            $model = new SlideModel();

            $data = $model->get_data($id);
            $data['msg'] = "Data berhasil ditampilkan";
        } catch (Exception $e) {
            $data = [
                'msg' => $e->getMessage()
            ];
        }

        return $this->response->setJSON($data);
    }

    public function delete()
    {
        try {
            $model = new SlideModel();

            $request = $this->request->getVar();
            $id = $request['id'];

            $model->delete_data($id);

            $data['msg'] = "Data berhasil dihapus";
        } catch (Exception $e) {
            $data['msg'] = $e->getMessage();
        }

        return $this->response->setJSON($data);
    }
}
