<?php

namespace App\Http\Controllers;
use App\Models\Status;
use Illuminate\Http\Request;
use Carbon\Carbon;


class StatusController extends Controller
{

    public function ViewStatus()
    {
        $status = Status::orderBy('status_number', 'ASC')->get();
        // dd($status);
        return view('view_status', compact('status'));
    }
    public function AddStatus()
    {
        return view('add_status');
    }

    public function StoreStatus(Request $request)
    {
        // dd($request->toArray());
        $request->validate([
            'status_name' => 'required',
            'status_number' => 'required',
        ]);

        Status::insert([
            'status_name' => $request->status_name,
            'status_number' => $request->status_number,
            'status_color_code' => $request->status_color_code,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
			'message' => 'Status Inserted Successfully',
			'alert-type' => 'success'
		);

        return redirect()->route('view.status')->with($notification);
    }

    public function EditStatus($id)
    {
        $status = Status::findOrFail($id);

        return view('edit_status', compact('status'));
    }

    public function UpdateStatus(Request $request, $id)
    {
        $request->validate([
            'status_name' => 'required',
            'status_number' => 'required',
        ]);

        Status::findOrFail( $id)->update([
            'status_name' => $request->status_name,
            'status_number' => $request->status_number,
            'status_color_code' => $request->status_color_code,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Status Updated Successfully',
            'alert-type' => 'success',
        );

        // Redirect back with the notification
        return redirect()->route('view.status')->with($notification);
    }

    public function DeleteStatus($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        $notification = array(
            'message' => 'Status Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
