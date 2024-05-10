<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GalleryController extends Controller
{
  public function galleryList(){
    try{
      $gallery = Gallery::get();
      return response()->json(['data' => $gallery]);
    }catch(Exception $exception){
      return response()->json(['error'=>$exception->getMessage()]);
    }
  }
  public function index()
  {
      try {
          return view('content.gallery.galleryList');
      } catch (Exception $exception) {
          return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
      }
  }

  public function addGallery()
  {
      try {
          return view('content.gallery.galleryAdd');
      } catch (Exception $exception) {
          return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
      }
  }

  public function editGallery($id)
  {
      try {
          $data = Gallery::findOrFail($id);
          return view('content.gallery.galleryEdit', compact('data'));
      } catch (Exception $exception) {
          return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
      }
  }

  public function deleteGallery(Request $request)
  {
      try {
          $data = Gallery::findOrFail($request->id);
          $data->delete();
          return response()->json(['success' => true]);
      } catch (Exception $exception) {
          return response()->json([
              'status' => 'fail',
              'message' => $exception->getMessage()
          ]);
      }
  }

  public function storeGallery(Request $request)
  {
      try {
          $request->validate([
              'image' => 'required'
          ]);
          $fileName = null;
          if ($request->hasFile('image')) {
              $file = $request->file('image');
              $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
              $file->move("gallery/", $fileName);
          }
          Gallery::create([
              'name' => $request->input('name'),
              'image' => $fileName
          ]);
          return redirect()->route('gallery-list')->with(['success'=>"Gallery Create Successfully"],200);
      } catch (ValidationException $validationException) {
          return redirect()->back()->with('error', $validationException->getMessage())->withInput();
      } catch (Exception $exception) {
          return redirect()->back()->with('error', $exception->getMessage())->withInput();
      }
  }

  public function updateGallery(Request $request, $id)
  {
      try {
          $data = Gallery::findOrFail($id);
          $fileName = $data->image;
          if ($request->hasFile('image')) {
              $request->validate([
                  'image' => 'required'
              ]);
              if (file_exists(public_path('gallery/' . $fileName))) {
                  unlink(public_path('gallery/' . $fileName));
              }
              $file = $request->file('image');
              $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
              $file->move("gallery/", $fileName);
          }
          $data->update([
            'name' => $request->input('name'),
            'image' => $fileName
          ]);
          return redirect()->route('gallery-list')->with(['success'=>"demo Update Successfully"],200);
      } catch (ValidationException $validationException) {
          return redirect()->back()->with('error', $validationException->getMessage())->withInput();
      } catch (Exception $exception) {
          return redirect()->back()->with('error', $exception->getMessage())->withInput();
      }
  }

}
