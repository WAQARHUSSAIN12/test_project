<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Test;

class HomeController extends Controller
{
    //
    public function home(){
        $items = Test::orderBy('shlef', 'ASC')->get();
        return view("home",["items"=> $items]);
    }

    public function update(Request $req){

        $maxNumber = max($req->order);
        
        foreach ($req->ids as $key => $id) {
            if ($req->item[$key] != "" ){
                $result = DB::table('tests')
                ->where('id', $id)
                ->update([
                'item' =>$req->item[$key],
                 ]);
            }else {
                $result = DB::table('tests')
                ->where('id', $id)
                ->update([
                'shlef' => $maxNumber+1,
                'item' => "",
                 ]);
            }          
        }
       return redirect("/")->with("message","updated successfully");
    }
}