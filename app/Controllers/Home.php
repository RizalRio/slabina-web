<?php

namespace App\Controllers;

use App\Models\Admin\GaleriModel;
use App\Models\Admin\SlideModel;
use App\Models\Admin\TentangModel;
use App\Models\Admin\KonfigurasiModel;
use Exception;

class Home extends BaseController
{
    private function get_slide()
    {
        $model = new SlideModel();

        try{
            $result = $model->get_slide();
        }catch (Exception $e){
            $result = [];
        }

        return $result;
    }

    private function get_merch()
    {
        $model = new TentangModel();

        try{
            $result = $model->get_merch();
        }catch (Exception $e){
            $result = [];
        }

        return $result;
    }

    private function get_galery()
    {
        $model = new GaleriModel();

        try{
            $result = $model->get_galery();
        }catch(Exception $e){
            $result = [];
        }

        return $result;
    }

    private function get_configuration()
    {
        $model = new KonfigurasiModel();

        try {
            $result = $model->get_data();
        } catch (Exception $e) {
            $result = [];
        }

        return $result;
    }

    public function index()
    {
        $data = [
            'title'         => 'Home',
            'slide'         => $this->get_slide(),
            'client'        => $this->get_merch(),
            'galery'        => $this->get_galery(),
            'configuration' => $this->get_configuration()
        ];
        
        return view('home', $data);
    }
}
