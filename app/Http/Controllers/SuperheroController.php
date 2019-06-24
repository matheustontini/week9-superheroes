<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Superhero;
use App\Emergencie;

class SuperheroController extends Controller
{
    //
    public function show($superhero_slug)
    {
        $superhero = \App\Superhero::where('slug', $superhero_slug)->first();

        if (!$superhero) {
            abort(404, 'Superhero not found');
        }

        $view = view('superhero/show');
        $view->superhero = $superhero;
        return $view;
    }

    public function index()
    {
        $superheroes = Superhero::orderBy('name', 'asc')->get();
        return view('superhero.index', compact('superheroes'));
    }

    public function store(Request $request)
    {
        $emergencie = new Emergencie();
        $emergencie->subject = $request->subject;
        $emergencie->description = $request->description;
        $emergencie->save();

        return redirect(action('SuperheroController@index'));
    }
}
