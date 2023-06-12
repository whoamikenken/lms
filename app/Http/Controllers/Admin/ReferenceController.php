<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReferenceRequest;
use App\Http\Requests\UpdateReferenceRequest;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::latest()->get();
        return view('admin.references.index', compact('references'));
    }
   
    public function create()
    {
        return view('admin.references.create');
    }

 
    public function store(StoreReferenceRequest $request)
    {
        $reference = Reference::create($request->all());

        return redirect()->route('admin.references.index');
    }

    public function edit(Reference $reference)
    {
        return view('admin.references.edit', compact('reference'));
    }

    public function update(UpdateReferenceRequest $request, Reference $reference)
    {
        $reference->update($request->all());

        return redirect()->route('admin.references.index');
    }


    public function destroy(Reference $reference)
    {
        $reference->delete();

        return back();
    }
}
