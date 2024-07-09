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
  public function facilitiesList()
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

  public function addFacilities()
  {
    try {
      return view("content.facilitie.facilitieAdd");
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function editFacilities($id)
  {
    try {
      $data = Facilitie::findOrFail($id);
      return view("content.facilitie.facilitieEdit", compact('data'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function deleteFacilities(Request $request)
  {
    try {
      $data = Facilitie::findOrFail($request->id);
      if($data->image){
        if (file_exists(public_path('facilitie/' . $data->image))) {
          unlink(public_path('facilitie/' . $data->image));
      }
      }
      $data->delete();
      return response()->json(['success' => true]);
    } catch (Exception $exception) {
      return response()->json([
        'status' => 'fail',
        'message' => $exception->getMessage()
      ]);
    }
  }

  public function storeFacilities(Request $request)
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
      return redirect()->route('facilities-list')->with(['success' => "Facilitie Create Successfully"], 200);
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }

  public function updateFacilities(Request $request, $id)
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
      return redirect()->route('facilities-list')->with(['success' => "Facilitie Update Successfully"], 200);
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }

  // Facilitie Details FacilitieDetail
  public function facilitiesDetailsList()
  {
    try {
      $facilitieDetails = FacilitieDetail::get();
      return response()->json(['data' => $facilitieDetails]);
    } catch (Exception $exception) {
      return response()->json(['error' => $exception->getMessage()]);
    }
  }

  public function indexfacilitiesDetails()
  {
    try {
      $data = FacilitieDetail::all();
      return view('content.facilitieDetail.facilitieDetailList', compact('data'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }
  public function addFacilitiesDetail()
  {
    try {
      $fasiliti = Facilitie::all();
      // dd( $fasiliti);
      return view("content.facilitieDetail.facilitieDetailAdd", compact('fasiliti'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function editFacilitiesDetail($id)
  {
    try {
      $data = FacilitieDetail::findOrFail($id);
      return view("content.facilitieDetail.facilitieDetailEdit", compact('data'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function deleteFacilitiesDetail(Request $request)
  {
    try {
      $data = FacilitieDetail::findOrFail($request->id);
      if($data->image){
        if (file_exists(public_path('facilitieDetail/' . $data->image))) {
          unlink(public_path('facilitieDetail/' . $data->image));
      }
      }
      $data->delete();
      return response()->json(['success' => true]);
    } catch (Exception $exception) {
      return response()->json([
        'status' => 'fail',
        'message' => $exception->getMessage()
      ]);
    }
  }

  public function storeFacilitiesDetail(Request $request)
  {
    try {
      $request->validate([
        'image' => 'required|image',
        'name' => 'required|string',
        'fasilitie_id' => 'required|string',
        'description' => 'required|string'
      ]);
      $fileName = null;
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move("facilitieDetail/", $fileName);
      }
      $facilitiedetail=FacilitieDetail::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'image' => $fileName
      ]);
      $facilitiedetail->facilities()->attach($request->input('fasilitie_id'));
      return redirect()->route('facilities-details-list')->with(['success' => "Facilities Detail Create Successfully"], 200);
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }

  public function updateFacilitiesDetail(Request $request, $id)
  {
    try {
      $data = FacilitieDetail::findOrFail($id);
      $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'fasilitie_id' => 'required|string'
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
      $data->facilities()->sync($request->input('fasilitie_id'));
      return redirect()->route('facilities-details-list')->with('success' , 'Facilities Detail Update Successfully');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }
}
