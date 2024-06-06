<?php

namespace App\Http\Controllers\notice;

use Exception;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class NoticeController extends Controller
{
  public function noticeList()
  {
    try {
      $notice = Notice::get();
      return response()->json(['data' => $notice]);
    } catch (Exception $exception) {
      return response()->json(['error' => $exception->getMessage()]);
    }
  }
  public function index()
  {
    try {
      return view('content.notice.noticeList');
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function addNotice()
  {
    try {
      return view("content.notice.noticeAdd");
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function editNotice($id)
  {
    try {
      $data = Notice::findOrFail($id);
      return view("content.notice.noticeEdit", compact('data'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function deleteNotice(Request $request)
  {
    try {
      $data = Notice::findOrFail($request->id);
      $data->delete();
      return response()->json(['success' => true]);
    } catch (Exception $exception) {
      return response()->json([
        'status' => 'fail',
        'message' => $exception->getMessage()
      ]);
    }
  }

  public function storeNotice(Request $request)
  {
    try {
      $request->validate([
        'name' => 'required|string',
        'image' => 'required|image',
        'description' => 'required',
        'date' => 'required'
      ]);
      $fileName = null;
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = date('Ymdhis') . '_' .$file->getClientOriginalName();
        $file->move("notice/", $fileName);
      }
      Notice::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'date' => $request->input('date'),
        'image' => $fileName
      ]);
      return redirect()->route('notice-list')->with('success', 'Notice Create Successfully');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }

  public function updateNotice(Request $request, $id)
  {
    try {
      $data = Notice::findOrFail($id);
      $request->validate([
        'name' => 'required|string',
        'description' => 'required',
        'date' => 'required'
      ]);
      $fileName = $data->image;
      if ($request->hasFile('image')) {
        $request->validate([
          'image' => 'required|image'
        ]);
        if (file_exists(public_path('notice/' . $fileName))) {
          unlink(public_path('notice/' . $fileName));
        }
        $file = $request->file('image');
        $fileName = date('Ymdhis') . '_' .$file->getClientOriginalName();
        $file->move("notice/", $fileName);
      }
      $data->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'date' => $request->input('date'),
        'image' => $fileName
      ]);
      return redirect()->route('notice-list')->with('success', 'Notice Update Successfully');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }
}
