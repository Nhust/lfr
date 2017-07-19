<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Event;
use DB;
use Validator;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user  = DB::table('users')
            ->select('*')
            ->where('id',$id)->first();


        $events=DB::table('events')
            ->select('*','events.nom as nom','instances.nom as instanceNom','events.id as id')
            ->where('user_id',$id)
            ->join('instances','instances.id','events.instance_id')
            ->get();
        $characters=DB::table('characters')->select('*')->where('user_id',$id)->get();


            return view('profile.show',compact('user','events','characters'));

    }
    public function edit($id){
        $user=User::findOrFail($id);
        return view('profile.edit',compact('user'));
    }
    public function update(Request $request, $id){

        Validator::make($request->all(), [
            'prenom' => 'required|',
            'nom' => 'required',
            'email'=>'required',
            'btag'=>'required|unique',
            ]);
        $user=User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('profile.index',auth::user()->id);    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEvents($id)
    {
        $events=DB::table('events')
            ->select('*','events.nom as nom','instances.nom as instanceNom','events.id as id')
            ->where('user_id',$id)
            ->join('instances','instances.id','events.instance_id')
            ->get();

        $participations =DB::table('characters_event')
            ->select('*','events.nom as eventNom','events.id as eventId','instances.nom as instanceNom')
            ->join('characters','characters.id','characters_event.character_id')
            ->join('events','characters_event.event_id','events.id')
            ->join('instances','instances.id','events.instance_id')
            ->whereIN('character_id',
            DB::table('characters')
            ->select('id')->where('user_id',$id))->get();

        return view('profile.events',compact('events','participations'));
    }
    public function showCharacters($id)
    {
        $characters=DB::table('characters')->select('*')->where('user_id',$id)->get();
        return view('profile.characters',compact('characters'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
