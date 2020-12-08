<?php 

class HomeController extends Controller{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return $this->CreateView('Home',$data);
    }
}