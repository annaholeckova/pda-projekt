<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;

class AgencyController extends Controller
{
	public function index()
	{
		$agencies = Agency::all();

		return view('agency.index', compact('agencies'));
    }

	public function show(Agency $agency)
	{
		return view('agency.show', compact('agency'));
	}

	public function update(Agency $agency)
	{
		$this->validate(request(), [
			'name' => 'required',
			'contact' => 'required'
		]);

		$agency->update(request()->all());

		return back()->with('status', 'Upráva úspešná');
	}

	public function destroy(Agency $agency)
	{
		$agency->delete();

		return redirect('agencies')->with('status', 'Odstránenie úspešné');
    }

	public function create()
	{
		return view('agency.create');
	}

	public function store()
	{
		$this->validate(request(), [
			'name' => 'required',
			'contact' => 'required'
		]);

		$agency = Agency::create(request()->all());
		return redirect('/agencies/' . $agency->id)->with('status', 'Úspešne vytvorené');

	}
}
