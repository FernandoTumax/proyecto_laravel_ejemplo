<?php

namespace App\Http\Controllers;

use App\Campu;
use App\State;
use App\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampusController extends Controller
{
    public function index(){
        $campus = Campu::all();

        return view('programas.index', compact('campus'));
    }

    public function create(){
        $states = State::all();
        $towns = Town::all();

        return view('programas.create', compact(['states', 'towns']));
    }

    public function towns(Request $request){
        if(isset($request->texto)){
            $towns = Town::where('departamento_id', '=', $request->texto)->get();
            return response()->json(
                [
                    'lista' => $towns,
                    'success' => true
                ]
            );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }

    public function validCode(Request $request)
    {
        $campus_id = $request->get('campus_id');
        $campus = DB::table('campus')
            ->where('code_campus', $request->get('code_campus'))
            ->where('id', '!=', $campus_id)
            ->first();

        return isset($campus) ? 'false' : 'true';
    }

    public function store(Request $request){
        
        $request->validate([
            'code_campus' => 'required|unique:campus',
            'name' => 'required',
            'state_id' => 'required',
            'town_id' => 'required'
        ]);

        // $campus = new Campu();

        // $campus->code_campus = $request->code_campus;
        // $campus->name = $request->name;
        // $campus->slug = $request->slug;
        // $campus->state_id = $request->state_id;
        // $campus->town_id = $request->town_id;

        $campus = Campu::create($request->all());

        return redirect()->route('campus.index');

    }

    public function show(Campu $campus){
        return view('programas.show', compact('campus'));
    }

    public function edit(Campu $campus){
        $states = State::all();
        $towns = Town::all();

        return view('programas.edit', compact(['campus', 'states', 'towns']));
    }

    public function update(Request $request, Campu $campus){

        $request->validate([
            'name' => 'required',
            'state_id' => 'required',
            'town_id' => 'required'
        ]);

        

        $campus->update($request->all());

        

        return redirect()->route('campus.show', $campus);

    }
    
    public function destroy(Campu $campus){
        $campus->delete();

        return redirect()->route('campus.index');
    }


}
