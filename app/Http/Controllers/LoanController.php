<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user && $user->role === 'admin') {
            $loans = Loan::with(['user','device'])->paginate(20);
        } else if ($user && $user->role === 'petugas') {
            $loans = Loan::with(['user','device'])->paginate(20);
        } else {
            $loans = Loan::with('device')->where('user_id', $user->id)->paginate(20);
        }
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $devices = Device::where('status','available')->get();
        return view('loans.create', compact('devices'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'device_id'=>'required|exists:devices,id',
            'start_date'=>'required|date',
            'end_date'=>'nullable|date|after_or_equal:start_date',
            'note'=>'nullable',
        ]);
        $data['user_id'] = Auth::id();
        $loan = Loan::create($data);
        $device = Device::find($data['device_id']);
        $device->status = 'reserved';
        $device->save();
        return redirect()->route('loans.index');
    }

    public function approve(Loan $loan)
    {
        $loan->status = 'approved';
        $loan->save();
        $device = $loan->device;
        $device->status = 'borrowed';
        $device->save();
        return back();
    }

    public function reject(Loan $loan)
    {
        $loan->status = 'rejected';
        $loan->save();
        $device = $loan->device;
        $device->status = 'available';
        $device->save();
        return back();
    }

    public function markReturned(Loan $loan)
    {
        $loan->status = 'returned';
        $loan->returned_at = now();
        $loan->save();
        $device = $loan->device;
        $device->status = 'available';
        $device->save();
        return back();
    }
}
