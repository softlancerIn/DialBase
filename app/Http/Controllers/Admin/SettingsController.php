<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;

class SettingsController extends Controller
{
    public function index()
    {
        $states = State::orderBy('name')->get();
        return view('admin.setting.index', compact('states'));
    }

    public function saveState(Request $request)
    {
        $name = str_replace(' ', '-', $request->name);
        $request->merge(['name' => $name]);

        $request->validate(['name' => 'required|string|max:255|unique:states,name']);

        State::firstOrCreate(['name' => $request->name]);

        return redirect()->back()->with('success', 'State created successfully');
    }

    public function saveCity(Request $request)
    {
        $name = str_replace(' ', '-', $request->name);
        $request->merge(['name' => $name]);

        $request->validate([
            'state_id' => 'required|exists:states,id',
            'name' => 'required|string|max:255'
        ]);

        City::firstOrCreate([
            'state_id' => $request->state_id,
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'City created successfully');
    }
}
