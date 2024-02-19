<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::with('user', 'department')->get();
        return view('assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->validated();
        $asset = new Asset();

        $asset->name = $request->name;
        $asset->make = $request->make;
        $asset->model = $request->model;
        $asset->type = $request->type;
        $asset->assettag = $request->assettag;
        $asset->serial = $request->serial;
        $asset->purchase_date = $request->purchase_date;
        $asset->warranty = $request->warranty;
        $asset->warranty_expiry = $request->warranty_expiry;


        // $asset = Asset::create($data);
        $asset->save();
        if (!$asset) {
            return redirect()->back()->with(
                'error',
                'Asset could not be created'
            );
        }

        return redirect()->route('assets.index')->with('success', 'Asset successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        $asset = Asset::find($asset->id);

        if (!$asset) {
            return redirect()->back()->with(
                'error',
                'Asset with id ' . $asset->id . ' was not found'
            );
        }

        return view('assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $asset = Asset::find($asset->id);

        if (!$asset) {
            return redirect()->back()->with(
                'error',
                'Asset with id ' . $asset->id . ' was not found'
            );
        }

        return view('assets.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        $asset = Asset::find($asset->id);

        if (!$asset) {
            return redirect()->back()->with(
                'error',
                'Asset with id ' . $asset->id . ' was not found'
            );
        }


        $asset->name = $request->name;
        $asset->make = $request->make;
        $asset->model = $request->model;
        $asset->type = $request->type;
        $asset->assettag = $request->assettag;
        $asset->serial = $request->serial;
        $asset->purchase_date = $request->purchase_date;
        $asset->warranty = $request->warranty;
        $asset->warranty_expiry = $request->warranty_expiry;


        // $asset = Asset::create($data);
        $asset->save();

        if (!$asset) {
            return redirect()->back()->with(
                'error',
                'Failed to update asset'
            );
        }

        return redirect()->route('assets.index')->with('success', 'Asset successfully updated');
    }

    public function assign(Request $request, Asset $asset)
    {
        $asset = Asset::find($asset->id);

        if (!$asset) {
            return redirect()->back()->with(
                'error',
                'Asset with id ' . $asset->id . ' was not found'
            );
        }

        if ($request->filled('user_id')) {
            $asset->user_id = $request->user_id;
        } elseif ($request->filled('department_id')) {
            $asset->department_id = $request->department_id;
        }

        $asset->save();

        return redirect()->back()->with('success', 'Asset assignment updated successfully');
    }

    public function deassign(Asset $asset)
    {
        $asset = Asset::find($asset->id);

        if (!$asset) {
            return redirect()->back()->with(
                'error',
                'Asset with id ' . $asset->id . ' was not found'
            );
        }

        if ($asset->user_id || $asset->department_id) {
            $asset->user_id = null;
            $asset->department_id = null;
            $asset->save();
        } else {
            return redirect()->back()->with(
                'error',
                'Asset is not assigned to any user or department'
            );
        }

        return redirect()->back()->with('success', 'Successfully deassigned asset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        $asset = Asset::find($asset->id);

        if (!$asset) {
            return redirect()->back()->with(
                'error',
                'Asset with id ' . $asset->id . ' was not found'
            );
        }

        $deleteAsset = null;

        if ($asset->trashed()) {
            $deleteAsset = $asset->forceDelete();
        } elseif (!$asset->trashed()) {
            $deleteAsset = $asset->delete();
        }

        if (!$deleteAsset) {
            return redirect()->back()->with(
                'error',
                'Failed to delete asset'
            );
        }

        return redirect()->back()->with('success', 'Asset deleted successfully');
    }

    public function restoreAsset(Asset $asset)
    {
        $asset = Asset::find($asset->id);

        if (!$asset) {
            return redirect()->back()->with(
                'error',
                'Asset with id ' . $asset->id . ' was not found'
            );
        }

        $restoreAsset = $asset->restore();

        if (!$restoreAsset) {
            return redirect()->back()->with(
                'error',
                'Failed to restore asset'
            );
        }

        return redirect()->route('assets.index')->with('success', 'Asset deleted successfully');
    }
}
