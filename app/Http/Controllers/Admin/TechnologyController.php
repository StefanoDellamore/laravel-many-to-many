<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Models
use App\Models\Technology;

//Helpers
use Illuminate\Support\Str;

//request

use App\Http\Requests\Technology\StoreRequest as TechnologyStoreRequest;
use App\Http\Requests\Technology\UpdateRequest as TechnologyUpdateRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologys = Technology::all();
        return view('admin.technologys.index', compact('technologys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologys.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyStoreRequest $request)
    {
        $technologyData = $request->validated();
        
        $slug = Str::slug($technologyData['title']);
        $technology = Technology::create([
            'title' => $technologyData['title'],
            'slug' => $slug,
        ]);

        return redirect() -> route('admin.technologys.show', ['technology'=>$technology->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();
        return view('admin.technologys.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();
        return view('admin.technologys.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TechnologyUpdateRequest $request, Technology $technology)
    {
        $technologyData = $request->validated();
        
        $slug = Str::slug($technologyData['title']);

        $technology->update([
            'title' => $technologyData['title'],
            'slug' => $slug,
        ]);

        return redirect() -> route('admin.technologys.show', ['technology'=>$technology->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $technology = Technology::where('slug', $slug)->firstOrFail();
        $technology -> delete();
        return redirect()->route('admin.technologys.index');
    }
}