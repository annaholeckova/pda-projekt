<?php

namespace App\Http\Controllers;

use App\WorkCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Work;
use App\Agency;
use App\Student;

class WorkController extends Controller
{
	public function index()
	{
		$works= Work::all();
		$categories = WorkCategory::all();
		$works->each(function($work){
			$work->starts_at = Carbon::parse($work->starts_at);
			$work->ends_at = Carbon::parse($work->ends_at);
		});
		return view('work.index', compact('works', 'categories'));
	}

	public function show(Work $work)
	{
		$agencies = Agency::all();
		$students = Student::with('works')->get();
		$categories = WorkCategory::all();
		$filteredStudents = [];

		foreach ($students as $student) {
			$isAdded = false;

			foreach ($student->works as $workItem) {
				if ($workItem->id == $work->id) {
					$isAdded = true;
				}
			}

			if (!$isAdded) {
				array_push($filteredStudents, $student);
			}
		}
		$work->starts_at = Carbon::parse($work->starts_at);

		$work->ends_at = Carbon::parse($work->ends_at);

		return view('work.show', compact('work', 'agencies','filteredStudents', 'categories'));
	}

	public function create()
	{
		$agencies = Agency::all();

		return view('work.create', compact('agencies'));
	}

	public function store()
	{
		$isActive = \request()->input('is_active') == 'on' ? 1 : 0;

		$req = request()->all();;
		$this->validate(\request(),[
			'title' => 'required',
			'employer' => 'required',
			'pay' => 'numeric',
			'agency_provision' => 'numeric',
		]);


		$work = Work::create([
			'title' => $req["title"],
			'description' => $req["description"],
			'pay' => $req["pay"],
			'employer' => $req["employer"],
			'starts_at' => $req["starts_at"],
			'ends_at' => $req["ends_at"],
			'work_category_id' => 1,
			'agency_id' => $req["agency_id"],
			'agency_provision' => $req["agency_provision"],
			'is_active' => $isActive
		]);


		return redirect('/works/' . $work->id)->with('status','Úspešne vytvorené');
	}

	public function update(Work $work)
	{
		$this->validate(\request(),[
			'title' => 'required',
			'employer' => 'required',
			'pay' => 'numeric',
			'starts_at' => 'date',
			'agency_provision' => 'numeric',
		]);


		$work->update(\request()->all());

		return back()->with('status', 'Úspešne updatnuté');
	}

	public function destroy(Work $work)
	{
		$work->delete();

		return redirect('/works')->with('status','Úspešne odstránené');
	}

	public function addStudent(Work $work)
	{
		$student_id = \request()->only('student_id');
		$work->students()->attach($student_id);

		return back()->with('status', 'Úspešne pridané');
	}

	public function removeStudent(Work $work)
	{
		$student_id = \request()->only('student_id');
		$work->students()->detach($student_id);

		return back()->with('status','Úspešne odstránené');
	}

	public function addCategory()
	{
		$this->validate(\request(), [
			'name' => 'required'
		]);
		WorkCategory::create(\request()->all());

		return back()->with('status', 'Úspešne pridané');
	}
}
