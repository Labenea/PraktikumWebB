<?php

    Route::set('', function(){
        $a = new HomeController;
        $a->index();
    });

    Route::set('login',function(){
        $a = new UsersController;
        $a->login();
    });
    Route::set('register',function(){
        
        $a = new UsersController;
        $a->register();
    });
    Route::set('logout',function(){
        
        $a = new UsersController;
        $a->logout();
    });
    Route::set('profile',function(){
        
        $a = new UsersController;
        $a->profile();
    });
    Route::set('profile/edit',function(){
        
        $a = new UsersController;
        $a->editProfile();
    });
?>