<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tasklist;

class tasklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasklists = $user->tasklists()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasklists' => $tasklists,
            ];
           
            return view('welcome', $data);
        }else {
            return view('welcome');
        }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasklist = new tasklist;
        if(\Auth::check()){
            return view('tasklists.create',[
                 'tasklist'=>$tasklist,
                ]);
        }
        else {
            return redirect('/');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:10',
            'content' => 'required|max:191',
        ]);
        
        $request->user()->tasklists()->create([
            'status'=>$request->status,
            'content'=>$request->content,
            ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tasklist = \App\tasklist::find($id);
        if(\Auth::check()){
            if(\Auth::user()->id === $tasklist->user_id){
                return view('tasklists.show',[
                    'tasklist'=> $tasklist
            ]);
        }
            else{
            return redirect('/');
        }
        }
        else{
            return redirect('/');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $tasklist = tasklist::find($id);
         if(\Auth::check()){
             if(\Auth::user()->id === $tasklist->user_id){
                 return view('tasklists.edit',[
                    'tasklist'=> $tasklist
                 ]);
          }
             else{
                 return redirect('/');
             }
         }
         else{
             return redirect('/');
         }
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
        $this->validate($request, [
            'status' => 'required|max:10',
            'content' => 'required|max:191',
        ]);
        
        $tasklist = tasklist::find($id);
        $tasklist->status = $request->status;
        $tasklist->content = $request->content;
        $tasklist->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasklist = tasklist::find($id);
        $tasklist->delete();

        return redirect('/');
    }
}
