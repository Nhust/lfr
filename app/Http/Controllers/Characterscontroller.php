<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


class Characterscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'pseudo' => 'required|unique:characters|max:255',
        ])->validate();
        $id = Auth::user()->id;
        Character::create([
            'pseudo'=> $request->pseudo,
            'race'=> $request->race,
            'classe'=>$request->classe,
            'level'=>$request->level,
            'faction'=>$request->faction,
            'itemLevel'=>$request->itemLevel,
            'serveur'=>$request->serveur,
            'user_id'=>$id
        ]);

        return redirect()->route('profile.showCharacters',$id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $char = DB::table('characters')->select('*')->where('id',$id)->first();
        return view('characters.show',compact('char'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $char = DB::table('characters')->select('*')->where('id',$id)->first();
        return view('characters.edit',compact('char'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateArray = [
            'pseudo' =>$request->pseudo,
            'race'=>$request->race,
            'classe' => $request->classe,
            'faction' => $request->faction,
            'level'=>$request->level,
            'itemLevel'=>$request->itemLevel,
            'serveur'=>$request->serveur,
        ];

        Validator::make($updateArray, [
            'pseudo' => 'required|max:255',
            'race' => 'required',
            'classe'=>'required',
            'faction'=>'required',
            'level'=>'required|numeric',
            'itemLevel'=>'required|numeric',
            'serveur'=>'required',

        ])->validate();
        $char=Character::findOrFail($id);
        $char->update($updateArray);
        return redirect()->route('profile.showCharacters',Auth::user()->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $character = Character::find($id);
        $character_userId = $character->user_id;
        $user = Auth::user()->id;
        if ($character_userId == $user) {
            $characterDelete = DB::table('characters')->select('*')->where('id',$id);
            $characEvent=DB::table('characters_event')->select('*')->where('character_id',$id);
            $characEvent->delete();
            $characterDelete->delete();


            return redirect()->back();
        }
        else {
            echo "Tu peux pas delete mdr boloss";
        }
    }
}
