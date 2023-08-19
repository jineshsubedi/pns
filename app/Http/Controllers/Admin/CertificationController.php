<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CertificationRequest;
use App\Library\Imagetool;
use App\Models\Certification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CertificationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:create-category', ['only' => ['store', 'create']]);
    //     $this->middleware('permission:update-category', ['only' => ['update', 'edit']]);
    //     $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    //     $this->middleware('permission:read-category', ['only' => ['show', 'index']]);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certifications = Certification::latest()->paginate(30)->withQueryString();
        return view('Admin.certification.index', compact('certifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.certification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificationRequest $request): RedirectResponse
    {
        $logo = '';
        if ($request->hasFile('logoFile')) {
            $file = $request->file('logoFile');
            $logo = 'certification/' . time() . '.' . $file->getClientOriginalExtension();
            Imagetool::storeImage($file, $logo);
        }
        Certification::create($request->validated() + [
            'banner' => $logo
        ]);
        return redirect()->route('admin.certification.index')->with('Certification Added Successfully');

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
    public function edit(Certification $certification)
    {
        return view('Admin.certification.edit', compact('certification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificationRequest $request, Certification $certification)
    {
        $logo = $certification->banner;
        if ($request->hasFile('logoFile')) {
            $file = $request->file('logoFile');
            $logo = 'certification/' . time() . '.' . $file->getClientOriginalExtension();
            Imagetool::storeImage($file, $logo);
        }
        $certification->update($request->validated() + [
            'banner' => $logo
        ]);
        return redirect()->route('admin.certification.index')->with('Certification Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certification $certification): RedirectResponse
    {
        $certification->delete();
        return redirect()->route('admin.certification.index')->with('Certification Deleted Successfully');
    }
}