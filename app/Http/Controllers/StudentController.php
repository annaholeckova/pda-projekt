<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
	public function index()
	{
		$students = Student::all();
		return view('students.index', compact('students'));
	}

	public function show(Student $student)
	{
		$studentSkills = $student->skills()->get();
		$skills = Skill::all();
		$filteredSkills = [];

		foreach ($skills as $skill) {
			$isAdded = false;
			foreach ($studentSkills as $studentSkill) {
				if ($skill->id == $studentSkill->id) {
					$isAdded = true;
				}
			}

			if (!$isAdded) {
				array_push($filteredSkills, $skill);
			}
		}


		return view('students.show', compact('student', 'skills', 'filteredSkills'));
	}

	public function create()
	{
		return view('students.create');
	}

	public function store()
	{
		$this->validate(\request(),[
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'preferred_rate' => 'numeric|min:0.1'
		]);

		$student = Student::create(\request()->all());

		return redirect('/students/' . $student->id)->with('status','Úspešne vytvorené');
	}

	public function update(Student $student)
	{
		$this->validate(\request(),[
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'preferred_rate' => 'numeric|min:0.1'
		]);


		$student->update(\request()->all());

		return back()->with('status', 'Úspešne updatnuté');


	}

	public function destroy(Student $student)
	{
		$student->delete();

		return redirect('/students')->with('status','Úspešne odstránené');
	}

	public function addSkill(Student $student)
	{
		$skill_id = \request()->only('skill_id');
		$student->skills()->attach($skill_id);

		return back()->with('status', 'Úspešne pridané');
	}

	public function removeSkill(Student $student)
	{
		$skill_id = \request()->only('skill_id');
		$student->skills()->detach($skill_id);

		return back()->with('status','Úspešne odstránené');
	}
}
