<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $this->seccionTitulo = 'Panel';

        $data = [
            'seccion_titulo'=>$this->seccionTitulo,
            'studentsCountActive' => 101,
            'studentsCountEgresados' => 511,
            'personalCount' => 11,
            'carrerasCount' => 8,
            'planesStudioCount' => 12,
        ];

        return view('home', $data);
    }

    public function template()
    {

        $this->seccionTitulo = 'Template';

        $data = [
            'seccion_titulo'=>$this->seccionTitulo
        ];

        return view('template', $data);
    }
}
