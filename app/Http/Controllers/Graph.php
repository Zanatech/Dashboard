<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;

class Graph extends Controller
{
	public static function example_chart(){
		return Charts::multi('bar', 'material')
            ->title("My Cool Chart")
            ->dimensions(0, 400)
            ->template("material")
            ->dataset('Element 1', [5,20,100])
            ->dataset('Element 2', [15,30,80])
            ->dataset('Element 3', [25,10,40])
            ->labels(['One', 'Two', 'Three']);
	}

	public static function bar_chart(){
		echo "Las funciones estan bajo estudio, en dependencia las situacion";
	}
}
