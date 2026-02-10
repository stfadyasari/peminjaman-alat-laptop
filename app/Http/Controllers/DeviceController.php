<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Category;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::with('category')->paginate(20);
        return view('admin.devices.index', compact('devices'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.devices.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'serial_number'=>'nullable',
            'category_id'=>'nullable|exists:categories,id',
            'condition'=>'nullable',
        ]);
        Device::create($data);
        return redirect()->route('admin.devices.index');
    }

    public function edit(Device $device)
    {
        $categories = Category::all();
        return view('admin.devices.edit', compact('device','categories'));
    }

    public function update(Request $request, Device $device)
    {
        $data = $request->validate([
            'name'=>'required',
            'serial_number'=>'nullable',
            'category_id'=>'nullable|exists:categories,id',
            'condition'=>'nullable',
        ]);
        $device->update($data);
        return redirect()->route('admin.devices.index');
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return back();
    }
}
