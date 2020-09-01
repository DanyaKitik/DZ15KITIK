<?php


namespace App\Http\Controllers;


use App\Ad;

class ShowController
{
    public function __invoke($id = null)
    {
        $ad = Ad::find($id);
        return view('show',['ad' => $ad]);
    }
}
