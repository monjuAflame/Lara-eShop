<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Color;
use App\model\Status;

class ManageController extends Controller
{
	//=============color============
    public function indexColor()
    {
    	$colors = Color::all();
    	return view('manage.color.index',compact('colors'));
    }

    public function createColor()
    {
    	return view('manage.color.create');
    }

    public function storeColor(Request $request)
    {
    	$color = new Color;
        $color->color_name = $request->color_name;
        $color->description   = $request->description;
        if ($color->save()) {
            return redirect()->route('color.index')->with('successMessage', 'Color Added Successfully!');
        }
    }

    public function editColor($id)
    {
    	$color = Color::where('id',$id)->first();
    	return view('manage.color.edit',compact('color'));
    }

    public function updateColor(Request $request)
    {
    	//dump($request->id);
    	$color = Color::find($request->id);
        $color->color_name = $request->color_name;
        $color->description   = $request->description;
        if ($color->save()) {
            return redirect()->route('color.index')->with('successMessage', 'Color Updated Successfully!');
        }
    }

    public function restoreColor()
    {
        // $colors = Color::withTrashed()->get();
        $colors = Color::onlyTrashed()->get();
        return view('manage.color.restore',compact('colors'));
    }

    public function postRestoreColor($id=null){
        if ($id!=null) {
            Color::onlyTrashed()->where('id',$id)->restore();
        } else {
            if (isset(request()->id)) {
                Color::onlyTrashed()->whereIn('id',request()->id)->restore();
            } else {
                return back()->with('dangerMessage', 'Pls check box to restore');
            }
        }
        return redirect()->route('color.restore.info')->with('successMessage', 'Color Restore Successfully!');
    }
    

    public function destroyColor($id)
    {
    	if (Color::destroy($id)) {
    		return redirect()->route('color.index')->with('dangerMessage', 'Color Deleted Successfully!');
    	}
    }
	//=============Status============
    public function indexStatus()
    {
    	$statuses = Status::all();
    	return view('manage.status.index',compact('statuses'));
    }
    public function createStatus()
    {
    	return view('manage.status.create');
    }
    public function storeStatus(Request $request)
    {
    	$status = new Status;
        $status->status = $request->status;
        $status->class  = $request->class;
        if ($status->save()) {
            return redirect()->route('status.index')->with('successMessage', 'Status Added Successfully!');
        }
    }
    public function editStatus($id)
    {
    	$status = Status::where('id',$id)->first();
    	return view('manage.status.edit',compact('status'));
    }
    public function updateStatus(Request $request)
    {
    	$status = Status::find($request->id);
        $status->status = $request->status;
        $status->class = $request->class;
        if ($status->save()) {
            return redirect()->route('status.index')->with('successMessage', 'Status Updated Successfully!');
        }
    }
    public function destroyStatus($id)
    {
    	if (Status::destroy($id)) {
    		return redirect()->route('status.index')->with('dangerMessage', 'Status Deleted Successfully!');
    	}
    }

}
