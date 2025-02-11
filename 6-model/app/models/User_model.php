<?php

class User_model{
    private $nama = 'admin';

    public function getUser()
    {
        return $this->nama;
    }
}