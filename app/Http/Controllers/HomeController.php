<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactModal;
use App\Models\CoursModal;
use App\Models\ProjectsModel;
use App\Models\ServicesModel;
use App\Models\visitorModel;
class HomeController extends Controller
{
    function HomeIndex(){
     $totalContact=ContactModal::count();
     $totalCours=CoursModal::count();
     $totalProject=ProjectsModel::count();
     $totalService=ServicesModel::count();
     $totalVisitor=visitorModel::count();
        return view('Home',[
            'totalContact'=>$totalContact,
            'totalCours'=>$totalCours,
            'totalProject'=>$totalProject,
            'totalService'=>$totalService,
            'totalVisitor'=>$totalVisitor

        ]);  
      }
  }

