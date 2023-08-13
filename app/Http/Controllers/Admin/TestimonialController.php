<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-testimonial', ['only' => ['store', 'create']]);
        $this->middleware('permission:update-testimonial',   ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete-testimonial',   ['only' => ['destroy']]);
        $this->middleware('permission:read-testimonial',   ['only' => ['show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('title')->paginate(30);
        return view('Admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request): RedirectResponse
    {
        Testimonial::create($request->validated());
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('Admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update($request->validated());
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial Deleted Successfully');
    }
}
