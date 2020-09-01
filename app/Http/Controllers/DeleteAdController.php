<?php


namespace App\Http\Controllers;


use App\Ad;

class DeleteAdController
{
    public function __invoke($id = null){
        Ad::where('id',$id)->delete();
        return redirect('/');
    }
}
