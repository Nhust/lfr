<?php

namespace App\Http\Controllers;
use App\CharacterEvent;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Instance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = DB::table('events')
            ->leftJoin('users','events.user_id','=','users.id')
            ->select('users.*','events.*','users.nom as usernom')
            ->orderBy('events.date')
            ->paginate(9);
        return view('event.index',compact('events','tests'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instances=Instance::all();
        return view('event.create',compact('instances'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instance_name=$request->instance;
            $instance_id=DB::table('instances')
                ->select('id')
                ->where('nom',$instance_name)
                ->get();
        /**
         * $json_decode pour récupérer la value de la requête SQL dans un tableau 2D
         */
        $id_instance = json_decode($instance_id,true);
        $id_instance=$id_instance[0]['id'];
        $t = $request->date;
        $t = date_create($t);
        $t = date_format($t,"Y-m-d");

        Validator::make($request->all(), [
        'nom' => 'required|unique:events|max:255',
        'difficulte' => 'required',
        'nbJoueurs'=>'required|numeric|min:5|max:30',
        'date'=>'required|date_format:Y-m-d',
        'heure'=>'required|date_format:h:i',
        'description'=>'required',
    ])->validate();
        Event::create([
            'user_id' => Auth::user()->id,
            'instance_id' => $id_instance,
            'nom' => $request->nom,
            'heure'=>$request->heure,
            'date' => $t,
            'difficulte' => $request->difficulte,
            'description' => $request->description,
            'nbCharacters' => $request->nbJoueurs,
    ]);
        return redirect()->route('event.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\fResponse
     */
    public function show($id)
    {
        $event=DB::table('events')
            ->select('*','instances.nom as instancesNom','events.id as eventId','events.nom as eventsNom')
            ->where('events.id',$id)
            ->join('instances','instances.id','events.instance_id')
            ->first();
        return view('event.show',compact('event'));
        var_dump($event);
    }
    public function showRoster($id){
        $event=DB::table('events')
            ->select('*','instances.nom as instancesNom','events.id as eventId','events.nom as eventsNom')
            ->where('events.id',$id)
            ->join('instances','instances.id','events.instance_id')
            ->first();
        $players=DB::table('characters')
            ->select('*')
            ->whereIN('id',(DB::table('characters_event')->select('character_id')->where('event_id',$id)->where('status','0')))
            ->get();
        $accepter = Db::table('characters')
            ->select('*')
            ->whereIN('id',(DB::table('characters_event')->select('character_id')->where('event_id',$id)->where('status',1)))
            ->get();
        $refuser = Db::table('characters')
            ->select('*')
            ->whereIN('id',(DB::table('characters_event')->select('character_id')->where('event_id',$id)->where('status',2)))
            ->get();
        return view('event.showRoster',compact('event','players','accepter','refuser'));
    }
    public function inscription($id){
        $Auth_id=Auth::id();
        $event=DB::table('events')
            ->select('*','instances.nom as instancesNom','events.id as eventId','events.nom as eventsNom')
            ->where('events.id',$id)
            ->join('instances','instances.id','events.instance_id')
            ->first();
        $personnages=DB::table('characters')
            ->select('characters.pseudo')
            ->where('characters.user_id',$Auth_id)
            ->get();
        return view('event.inscription',compact('personnages','event'));
    }

    public function confirmer($id,$accepte){
        DB::table('characters_event')
            ->select('*')
            ->where('event_id',$id)
            ->where('character_id',$accepte)
            ->update(['status' => 1]);
        return redirect()->back();

    }
    public function refuser($id,$refuser){
        DB::table('characters_event')
            ->select('*')
            ->where('event_id',$id)
            ->where('character_id',$refuser)
            ->update(['status' => 2]);
        return redirect()->back();
    }
    public function savesCharacters(Request $request, $id)
    {
        $pseudo=$request->personnage;
        var_dump($pseudo);
        $character_id=DB::table('characters')
            ->select('id')
            ->where('pseudo',$pseudo)
            ->get();
        var_dump($character_id);
        $character_id = json_decode($character_id,true);
        $character_id=$character_id[0]['id'];
        var_dump($character_id);
        CharacterEvent::create([
            'event_id'=>$id,
            'character_id'=>$character_id,
            'status'=>'0',
        ]);
        var_dump($id);
        return redirect()->route('event.showRoster',$id);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $instances = Instance::all();
        $date=DB::table('events')
            ->select('date')
            ->where('id',$id)
        ->get();
        $date =json_decode($date,true);
        $date_json = $date[0]['date'];
        $date=date_create($date_json);
        $date = date_format($date,"Y-m-d");
        return view('event.edit',compact('event','instances','date'));

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
        $instance_name=$request->instance;
        $instance_id=DB::table('instances')
            ->select('id')
            ->where('nom',$instance_name)
            ->get();
        $id_instance = json_decode($instance_id,true);
        $id_instance=$id_instance[0]['id'];
        $updateArray = [
            'nom' =>$request->nom,
            'difficulte'=>$request->difficulte,
            'instance_id' => $id_instance,
            'date'=>$request->date,
            'heure'=>$request->heure,
            'description'=>$request->description,
            'nbCharacters'=>$request->nbJoueurs,

        ];
        Validator::make($updateArray, [
            'nom' => 'required|max:255',
            'difficulte' => 'required',
            'instance_id'=>'required|numeric',
            'nbCharacters'=>'required',
            'date'=>'required|date_format:Y-m-d',
            'heure'=>'required|date_format:H:i:s',
            'description'=>'required',
            'nbCharacters'=>'required|numeric|min:5|max:30',

        ])->validate();
        $event=Event::findOrFail($id);
        $event->update($updateArray);
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Event::find($id);
        $event_userId = $events->user_id;
        $user = Auth::user()->id;
        if ($event_userId == $user) {
            $all= DB::table('characters_event')
                ->select('*')
                ->where('event_id',$id);
            $all->delete();
            $events->delete();
            return redirect()->back();
        }
        else {
            echo "Tu peux pas delete mdr boloss";
        }
    }
}
