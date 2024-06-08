<?php

namespace App\Http\Controllers\aboutus;

use Exception;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class AboutUsController extends Controller
{
  public function aboutUsList()
  {
    try {
      $aboutUs = AboutUs::all();
      return response()->json(['data' => $aboutUs]);
    } catch (Exception $exception) {
      return response()->json(['error' => $exception->getMessage()]);
    }
  }
  public function index()
  {
    try {
      return view('content.aboutUs.aboutUsList');
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function addAboutUs()
  {
    try {
      return view("content.aboutUs.aboutUsAdd");
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function editAboutUs($id)
  {
    try {
      $data = AboutUs::findOrFail($id);
      return view("content.aboutUs.aboutUsEdit", compact('data'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function deleteAboutUs(Request $request)
  {
    try {
      $data = AboutUs::findOrFail($request->id);
      $data->delete();
      return response()->json(['success' => true]);
    } catch (Exception $exception) {
      return response()->json([
        'status' => 'fail',
        'message' => $exception->getMessage()
      ]);
    }
  }

  public function storeAboutUs(Request $request)
  {
    try {
      $request->validate([
        'name' => 'required|string',
        'title' => 'required|string',
        'image' => 'required|image',
        'description' => 'required|string'
      ]);
      $fileName = null;
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName() . '_' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move("aboutUs/", $fileName);
      }
      AboutUs::create([
        'name' => $request->input('name'),
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'image' => $fileName
      ]);
      return redirect()->route('aboutUs-list')->with('success', 'About Us Create Successfully');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }

  public function updateAboutUs(Request $request, $id)
  {
    try {
      $data = AboutUs::findOrFail($id);
      $request->validate([
        'name' => 'required|string',
        'title' => 'required|string',

        'description' => 'required|string'
      ]);
      $fileName = $data->image;
      if ($request->hasFile('image')) {
        $request->validate([
          'image' => 'required|image'
        ]);
        if (file_exists(public_path('aboutUs/' . $fileName))) {
          unlink(public_path('aboutUs/' . $fileName));
        }
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move("aboutUs/", $fileName);
      }
      $data->update([
        'name' => $request->input('name'),
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'image' => $fileName
      ]);
      return redirect()->route('aboutUs-list')->with('success', 'About Us Update Successfully');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }
}
