<?php
class Users{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function profile(){
        $this->db->query('SELECT * FROM User WHERE ID = :id');
        $this->db->bind(':id',$_SESSION['user_id']);
        $row = $this->db->singleArr();
        if($row != null){
            return $row;
        }else{
            return false;
        }
    }
    public function deleteUser(){
        $this->db->query('DELETE FROM User WHERE ID = :id');
        $this->db->bind(':id',$_SESSION['user_id']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function editNama($data){
        $this->db->query('UPDATE User SET nama_depan = :nama_depan , nama_belakang = :nama_belakang WHERE ID = :id');
        $this->db->bind(':id',$_SESSION['user_id']);
        $this->db->bind(':nama_depan',$data['nama_depan']);
        $this->db->bind(':nama_belakang',$data['nama_belakang']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function register($data){
        $this->db->query('INSERT INTO User (username,password,nama_depan,nama_belakang,email,status,no_telp,jalan,kota,kabupaten) VALUES(:username, :password, :nama_depan, :nama_belakang, :email, :status, :no_telp, :jalan, :kota, :kabupaten)');

        $this->db->bind(':username',$data['username']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':nama_depan',$data['nama_depan']);
        $this->db->bind(':nama_belakang',$data['nama_belakang']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':status',$data['status']);
        $this->db->bind(':no_telp',$data['notelp']);
        $this->db->bind(':jalan',$data['jalan']);
        $this->db->bind(':kota',$data['kota']);
        $this->db->bind(':kabupaten',$data['kabupaten']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function login($data){
        $this->db->query('SELECT * FROM User WHERE username = :username AND password = :password');

        $this->db->bind(':username',$data['username']);
        $this->db->bind(':password',$data['password']);

        

        if($row = $this->db->single()){
            return $row;
        }else{
            return false;
        }

    }
}