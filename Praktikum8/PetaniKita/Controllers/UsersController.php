<?php
class UsersController extends Controller{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('Users');
    }
    public function login(){
        $post = json_decode(file_get_contents('php://input'), true);
        if(isset($post)){
            $data = [
                'username' => $post['username'],
                'password' => $post['password'],
                'error' => '',
            ];
            $data['password'] = md5($post['password']);
            $logedInUser = $this->userModel->login($data);
            if($logedInUser){
                $this->createUserSession($logedInUser);
            }else{
                $data['error'] = 'Password or Username Is Incorect';
                $data['status'] = false;
                $mydata = json_encode($data);
                echo $mydata;
            }
        }else{
            header('location: '.URLROOT.'/');
        }
     

    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->ID;
        $_SESSION['username'] = $user->username;
        $_SESSION['message'] = 'Login Success';
        return true;
    }

    public function logout(){
        unset($_SESSION['user_id']);
        header('location: '.URLROOT.'');
    }

    public function register(){
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'nama_depan' => trim($_POST['nama_depan']),
                'nama_belakang' => trim($_POST['nama_belakang']),
                'email' => trim($_POST['email']),
                'status' => 'user',
                'notelp' => trim($_POST['no_telp']),
                'jalan' => trim($_POST['jalan']),
                'kota' => trim($_POST['kota']),
                'kabupaten' => trim($_POST['kabupaten']),
            ];

            foreach($data as $dat){
                if(empty($dat)){
                    $_SESSION['message']= 'All Field Must Be Filed';
                    return var_dump($dat);
                    return header('location: '.URLROOT.'/register');
                }
            }
            $data['password'] = md5($data['password']);
            if($this->userModel->register($data)){
                $logedInUser = $this->userModel->login($data);
                if($logedInUser){
                    $this->createUserSession($logedInUser);
                }
                $_SESSION['message']= 'Register Successful';
                return header('location: '.URLROOT.'/');
            } 
        }else{
            $data = [
                'title' => 'Register',
            ];
            return $this->CreateView('Register',$data);
        }
        
    }

    public function profile(){

        if(isLogedIn()){
            $data = $this->userModel->profile();
           
            if($data){
                return $this->CreateView('Profile',$data);
            }
            
        }else{
            return header('location: '.URLROOT.'');
        }

    }

    public function editProfile(){

        $post = json_decode(file_get_contents('php://input'), true);
        if(isset($post)){
            switch($post['button']){
                case 'Save' :
                     $data = [
                        'nama_depan' => $post['nama_depan'],
                        'nama_belakang' => $post['nama_belakang'],
                     ];
                     if($this->userModel->editNama($data)){
                         return true;
                     }else{
                         $data['status'] = false;
                         $mydata = json_encode($data);
                         echo $mydata;
                     }
                break; 
            }
        }else{
            return header('location: '.URLROOT.'');
        }

    }

    public function validate(){



    }
}