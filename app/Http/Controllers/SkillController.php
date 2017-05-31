<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

class SkillController extends Controller
{
	public function index()
	{
		$skills = Skill::all();

		return view('skills.index', compact('skills'));
    }

	public function show(Skill $skill)
	{
		return view('skills.show', compact('skill'));
    }

	public function create()
	{
		return view('skills.create');
    }

	public function store()
	{
		$this->validate(\request(),[
			'name' => 'required'
		]);

		$skill = Skill::create(\request()->all());

		return redirect('/skills/' . $skill->id)->with('status','Úspešne vytvorené');
    }

	public function update(Skill $skill)
	{
		$this->validate(\request(),[
			'name' => 'required'
		]);

		$skill->update(\request()->all());
    }

	public function destroy(Skill $skill)
	{
		$skill->delete();

		return redirect('/skills')->with('status','Úspešne odstránené');
    }
}
