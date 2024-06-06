<?php

namespace App\Http\Controllers\facilitie;

use Exception;
use App\Models\Facilitie;
use Illuminate\Http\Request;
use App\Models\FacilitieDetail;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class FacilitieController extends Controller
{
  public function facilitieList()
  {
    try {
      $facilitie = Facilitie::get();
      return response()->json(['data' => $facilitie]);
    } catch (Exception $exception) {
      return response()->json(['error' => $exception->getMessage()]);
    }
  }
  public function index()
  {
    try {
      $data = Facilitie::all();
      return view('content.facilitie.facilitieList', compact('data'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function addFacilitie()
  {
    try {
      return view("content.facilitie.facilitieAdd");
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function editFacilitie($id)
  {
    try {
      $data = Facilitie::findOrFail($id);
      return view("content.facilitie.facilitieEdit", compact('data'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function deleteFacilitie(Request $request)
  {
    try {
      $data = Facilitie::findOrFail($request->id);
      $data->delete();
      return response()->json(['success' => true]);
    } catch (Exception $exception) {
      return response()->json([
        'status' => 'fail',
        'message' => $exception->getMessage()
      ]);
    }
  }

  public function storeFacilitie(Request $request)
  {
    try {
      $request->validate([
        'image' => 'required|image',
        'name' => 'required|string'
      ]);
      $fileName = null;
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move("facilitie/", $fileName);
      }
      Facilitie::create([
        'name' => $request->input('name'),
        'image' => $fileName
      ]);
      return redirect()->route('facilitie-list')->with(['success' => "Facilitie Create Successfully"], 200);
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }

  public function updateFacilitie(Request $request, $id)
  {
    try {
      $data = Facilitie::findOrFail($id);
      $request->validate([
        'name' => 'required|string'
      ]);
      $fileName = $data->image;
      if ($request->hasFile('image')) {
        $request->validate([
          'image' => 'required'
        ]);
        if (file_exists(public_path('facilitie/' . $fileName))) {
          unlink(public_path('facilitie/' . $fileName));
        }
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move("facilitie/", $fileName);
      }
      $data->update([
        'name' => $request->input('name'),
        'image' => $fileName
      ]);
      return redirect()->route('facilitie-list')->with(['success' => "Facilitie Update Successfully"], 200);
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }

  // Facilitie Details FacilitieDetail
  public function facilitieDetailsList()
  {
    try {
      $facilitieDetails = FacilitieDetail::get();
      return response()->json(['data' => $facilitieDetails]);
    } catch (Exception $exception) {
      return response()->json(['error' => $exception->getMessage()]);
    }
  }

  public function indexfacilitieDetails()
  {
    try {
      $data = FacilitieDetail::all();
      return view('content.facilitieDetail.facilitieDetailList', compact('data'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }
  public function addFacilitieDetail()
  {
    try {
      return view("content.facilitieDetail.facilitieDetailAdd");
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function editFacilitieDetail($id)
  {
    try {
      $data = FacilitieDetail::findOrFail($id);
      return view("content.facilitieDetail.facilitieDetailEdit", compact('data'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function deleteFacilitieDetail(Request $request)
  {
    try {
      $data = FacilitieDetail::findOrFail($request->id);
      $data->delete();
      return response()->json(['success' => true]);
    } catch (Exception $exception) {
      return response()->json([
        'status' => 'fail',
        'message' => $exception->getMessage()
      ]);
    }
  }

  public function storeFacilitieDetail(Request $request)
  {
    try {
      $request->validate([
        'image' => 'required|image',
        'name' => 'required|string',
        'description' => 'required|string'
      ]);
      $fileName = null;
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move("facilitieDetail/", $fileName);
      }
      FacilitieDetail::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'image' => $fileName
      ]);
      return redirect()->route('facilitie-details-list')->with(['success' => "FacilitieDetail Create Successfully"], 200);
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }

  public function updateFacilitieDetail(Request $request, $id)
  {
    try {
      $data = FacilitieDetail::findOrFail($id);
      $request->validate([
        'name' => 'required|string',
        'description' => 'required|string'
      ]);
      $fileName = $data->image;
      if ($request->hasFile('image')) {
        $request->validate([
          'image' => 'required'
        ]);
        if (file_exists(public_path('facilitieDetail/' . $fileName))) {
          unlink(public_path('facilitieDetail/' . $fileName));
        }
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move("facilitieDetail/", $fileName);
      }
      $data->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'image' => $fileName
      ]);
      return redirect()->route('facilitie-details-list')->with('success' , 'FacilitieDetail Update Successfully');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }
}
