<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectsModel;
class ProjctController extends Controller
{
    function projctIndex(){
        return view('project');
    }

    function getProjectData(){
        $result=json_encode(ProjectsModel::orderBy('id','desc')->get());
        return $result;
      }

      function getProjectDetails(Request $req){
        $id=$req->input('id');
        $result=json_encode(ProjectsModel::where('id','=',$id)->get());
        return $result;
      }
      
      function ProjectDelete(Request $req){
       $id=$req->input('id');
      $result= ProjectsModel::where('id','=',$id)->delete();
      if($result==true){
       return 1;
      }else{
       return 0;
      }
      }
   
   
      function ProjectUpdate(Request $req){
       $id=$req->input('id');
       $name=$req->input('name');
       $des=$req->input('des');
       $link=$req->input('link');
       $img=$req->input('img');
   
      $result= ProjectsModel::where('id','=',$id)->update(['project_name'=>$name,'project_des'=>$des,'project_link'=>$link,'project_img'=>$img]);
      if($result==true){
       return 1;
      }else{
       return 0;
      }
      }
   
   
      function ProjectAdd(Request $req){
   
       $name=$req->input('name');
       $des=$req->input('des');
       $link=$req->input('link');
       $img=$req->input('img');
   
      $result= ProjectsModel::insert([
       'project_name'=>$name,
       'project_des'=>$des,
       'project_link'=>$link,
       'project_img'=>$img
     ]);
      if($result==true){
       return 1;
      }else{
       return 0;
      }
      }
}
