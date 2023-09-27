<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Workout;

class WorkoutController extends Controller
{
    public function index()
    {
        $workouts = Workout::with('type')->paginate(8);

        return view('workouts.index', [
            'workouts' => $workouts,
        ]);
    }

    public function create()
    {
        $types = Type::all();

        return view('workouts.create', [
            'types' => $types,
        ]);
    }

    public function store()
    {
        $validated = request()->validate([
            'date' => 'required',
            'name' => 'nullable',
            'music' => 'nullable',
            'venue' => 'nullable',
            'body_weight' => 'nullable',
            'calories_burned' => 'nullable',
            'length' => 'nullable',
            'notes' => 'nullable',
            'type_id' => 'required|exists:types,id',
        ]);

        Workout::create($validated);

        return redirect('/workouts');
    }

    public function show($id)
    {
        $workout = Workout::with(['exercises.sets' => function ($query) use ($id) {
            $query->where('workout_id', $id);
        }])->find($id);

        return view('workouts.show', [
            'workout' => $workout,
        ]);
    }

    public function edit($id)
    {
        $workout = Workout::find($id);
        $types = Type::all();

        return view('workouts.edit', [
            'workout' => $workout,
            'types' => $types,
        ]);
    }

    public function update($id)
    {
        $validated = request()->validate([
            'date' => 'required',
            'type' => 'required',
            'name' => 'nullable',
            'music' => 'nullable',
            'venue' => 'nullable',
            'body_weight' => 'nullable',
            'calories_burned' => 'nullable',
            'length' => 'nullable',
            'notes' => 'nullable',
        ]);

        $workout = Workout::find($id);
        $workout->update($validated);

        return redirect('/workouts/' . $id);
    }

    public function destroy($id)
    {
        $workout = Workout::find($id);
        $workout->delete();

        return redirect('/workouts');
    }
}
