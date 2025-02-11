<?php

class About extends Controller{
    public function index($nama="none")
    {
        $data['judul'] = 'About Me';
        $data['nama'] = $nama;
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'My Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}