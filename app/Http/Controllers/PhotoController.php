<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PhotoModel;

class PhotoController extends Controller
{
    function PhotoIndex (){
        return view('Photo');
    }
    function PhotoDelete(Request $request){
        $oldPhotoURL=$request->input('oldPhotoURL');
        $oldPhotoId=$request->input('id');

        $oldPhotoURLArray=explode('/',$oldPhotoURL);
        $oldPhotoName=end($oldPhotoURLArray);
        $DeletePhotoFile=Storage::delete('public/'.$oldPhotoName);

        $DeleteRowe=PhotoModel::where('id','=',$oldPhotoId)->delete();
        return $DeleteRowe;

    }
    function PhotoJSON (Request $request){
        return PhotoModel::take(8)->get();

    }
    function PhotoJSONByID (Request $request){
       $FirstID=$request->id;
       $LastID=$FirstID+3;
       return PhotoModel::where('id','>',$FirstID)->where('id','<=',$LastID)->get();
    }

    function PhotoUplod(Request $request){
     $photoPath=  $request->file('photo')->store('public');
     $photoName=(explode('/',$photoPath))[1];
     $host=$_SERVER["HTTP_HOST"];
     $location="http://".$host."/storage/".$photoName;
     $result= PhotoModel::insert(['location'=>$location]);
      return $result;

    }
}
