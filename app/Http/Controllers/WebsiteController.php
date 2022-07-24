<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Models\Website;
use Inertia\Inertia;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::with('latestStatus')->get();

        return Inertia::render('Dashboard', [
            'websites' => $websites,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Website/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWebsiteRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreWebsiteRequest $request)
    {
        $website = Website::create($request->validated());

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Inertia\Response
     */
    public function show(Website $website)
    {
        return Inertia::render('Website/Show', [
            'website' => $website,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website  $website
     * @return \Inertia\Response
     */
    public function edit(Website $website)
    {
        return Inertia::render('Website/Edit', [
            'website' => $website,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWebsiteRequest $request
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateWebsiteRequest $request, Website $website)
    {
        $website->update($request->validated());

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website  $website
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Website $website)
    {
        $website->delete();

        return redirect()->route('dashboard');
    }
}
