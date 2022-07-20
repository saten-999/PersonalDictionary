<?php

namespace App\Http\Controllers;

use App\Dictionary;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Mail;
use App\Mail\Reminder;
class DictionaryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = Dictionary::where('user_id', Auth::user()->id)->latest()->get();

        return response()->json($words);
    }

    public function test()
    {
        $users = User::whereNotNull('email_verified_at')->get()->toArray();

        for ($i=0; ; $i++) { 
            
            $words = Dictionary::where('user_id', $users[$i]['id'])->get()->toArray();

            
            if(count($words)>0 && count($words)<=5){
                $return = $words ;
            }elseif(count($words)>0 && count($words)>5){
                $return =array();
                $numbers = range(0, count($words)-1);
                
                shuffle($numbers);
               
                for ($j=0; $j <5 ; $i++) { 

                    $return[$j] = $words[$numbers[$j]];
                }

            }else{
                continue;
            }     


            // Mail::to($users[$i]['email'])->send(new Reminder($return));
            
        } 
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request ->validate([
            'armenian' => 'required',
            'english' => 'required'
        ]);
        $data['user_id'] = Auth::user()->id;

        $words = Dictionary::create($data);

        return response()->json($words);
        

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function show(Dictionary $dictionary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function edit(Dictionary $dictionary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'armenian' => 'required',
            'english' => 'required'
        ]);
        $data['user_id'] = Auth::user()->id;

        $words = Dictionary::find($id)->update($data);

        return response()->json($words);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dictionary  $dictionary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dictionary::findOrFail($id)->delete();
    }
}
