<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function search(Request $request){
        $search  = $request->search;



            $recherches = DB::table('events')
                ->select('users.*', 'events.*', 'users.nom as usernom')
                ->where('events.nom', 'Like', '%' . $search . '%')
                ->leftJoin('users', 'events.user_id', '=', 'users.id')
                ->orderBy('events.date')
                ->get();
            $recherchesCount = DB::table('events')
                ->select('users.*', 'events.*', 'users.nom as usernom')
                ->where('events.nom', 'Like', '%' . $search . '%')
                ->leftJoin('users', 'events.user_id', '=', 'users.id')
                ->orderBy('events.date')
                ->count();
        
    return view('search',compact('recherches','recherchesCount'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index');
    }
}
