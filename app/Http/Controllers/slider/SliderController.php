<?php

namespace App\Http\Controllers\slider;

use Exception;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class SliderController extends Controller
{
  public function sliderList()
  {
    try {
      $slider = Slider::all();
      return response()->json(['data' => $slider]);
    } catch (Exception $exception) {
      return response()->json(['error' => $exception->getMessage()]);
    }
  }
  public function index()
  {
      try {
          return view('content.slider.sliderList');
      } catch (Exception $exception) {
          return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
      }
  }

  public function addSlider()
  {
      try {
          return view("content.slider.sliderAdd");
      } catch (Exception $exception) {
          return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
      }
  }

  public function editSlider($id)
  {
      try {
          $data = Slider::findOrFail($id);
          return view("content.slider.sliderEdit", compact('data'));
      } catch (Exception $exception) {
          return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
      }
  }

  public function deleteSlider(Request $request)
  {
      try {
          $data = Slider::findOrFail($request->id);
          if($data->image){
            if (file_exists(public_path('slider/' . $data->image))) {
              unlink(public_path('slider/' . $data->image));
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

  public function storeSlider(Request $request)
  {
      try {
          $request->validate([
              'image' => 'required'
          ]);
          $fileName = null;
          if ($request->hasFile('image')) {
              $file = $request->file('image');
              $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis').'.'.$file->getClientOriginalExtension();
              $file->move("slider/", $fileName);
          }
          Slider::create([
              'image' => $fileName
          ]);
          return redirect()->route('slider-list')->with(['success'=>"Slider Create Successfully"],200);
      } catch (ValidationException $validationException) {
          return redirect()->back()->with('error', $validationException->getMessage())->withInput();
      } catch (Exception $exception) {
          return redirect()->back()->with('error', $exception->getMessage())->withInput();
      }
  }

  public function updateSlider(Request $request, $id)
  {
      try {
          $data = Slider::findOrFail($id);
          $fileName = $data->image;
          if ($request->hasFile('image')) {
              $request->validate([
                  'image' => 'required'
              ]);
              if (file_exists(public_path('slider/' . $fileName))) {
                  unlink(public_path('slider/' . $fileName));
              }
              $file = $request->file('image');
              $fileName = $file->getClientOriginalName() . '.' . date('Ymdhis').'.'.$file->getClientOriginalExtension();
              $file->move("slider/", $fileName);
          }
          $data->update([
              'image' => $fileName
          ]);
          return redirect()->route('slider-list')->with(['success'=>"Slider Update Successfully"],200);
      } catch (ValidationException $validationException) {
          return redirect()->back()->with('error', $validationException->getMessage())->withInput();
      } catch (Exception $exception) {
          return redirect()->back()->with('error', $exception->getMessage())->withInput();
      }
  }

}
