<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::all();

        $activities = Activity::paginate(8);
        return view('activities.index',[
            'activities' => $activities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newActivity = new Activity();
        $newActivity->name = $data['name'];
        $newActivity->description = $data['description'];
        $newActivity->year = $data['year'];
        $newActivity->user_id = $request->user()->id;
        $newActivity->save();

        return redirect()->route('activities.index', ['id' => $newActivity->id])->with('created_success', $newActivity);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.show', [
            'activity' => $activity
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        if($request->user()->id !== $activity->user_id) abort('401');
        return view('activities.edit', [
            'activity' => $activity
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $activity = Activity::findOrFail($id);
        if($request->user()->id !== $activity->user_id) abort('401');

        $activity->name = $data['name'];
        $activity->description = $data['description'];
        $activity->year = $data['year'];
        $activity->update();

        return redirect()->route('activities.index')->with('updated_success', $activity);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        if($request->user()->id !== $activity->user_id) abort('401');

        return redirect()->route('activities.index')->with('deleted_success', $activity);
    }
}
