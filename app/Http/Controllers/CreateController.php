<?php


namespace App\Http\Controllers;


use App\Ad;
use Illuminate\Support\Facades\Validator;

class CreateController
{
    public function form(){
        return view('ad-form');
    }
    public function check(){
        $validator = Validator::make(
            request()->all(),
            [
                'title' => 'required|min:10|max:255',
                'description' => 'required|min:25|max:65535'
            ]
        );
        if ($validator->fails()){
            return redirect('create')
                ->withErrors($validator->errors())
                ->withInput(request()->all());
        }
        $ad = new Ad();
        $ad->title = request()->get('title');
        $ad->description = request()->get('description');
        auth()->user()->ads()->save($ad);
        return redirect()->route('home')
            ->with('success' , "Ad \"{$ad->title}\" was successfully created.");
    }
}
