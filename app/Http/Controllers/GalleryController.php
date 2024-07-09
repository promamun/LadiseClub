<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GalleryController extends Controller
{
    public function galleryList()
    {
        try {
            $gallery = Gallery::get();
            return response()->json(['data' => $gallery]);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
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
            if($data->image){
              if (file_exists(public_path('gallery/' . $data->image))) {
                unlink(public_path('gallery/' . $data->image));
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

    public function storeGallery(Request $request)
    {
        try {
            $request->validate([
                'key' => 'required',
                'value' => 'required'
            ]);
            $fileName = $request->input('value');
            if ($request->hasFile('value')) {
                $file = $request->file('value');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
                $file->move("gallery/", $fileName);
            }
            Gallery::create([
                'key' => $request->input('key'),
                'value' => $fileName
            ]);
            return redirect()->route('gallery-list')->with(['success' => "gallery Create Successfully"], 200);
        } catch (ValidationException $validationException) {
            return redirect()->back()->with('error', $validationException->getMessage())->withInput();
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }

    public function updateGallery(Request $request, $id)
    {
        try {
            $request->validate([
              'key' => 'required',
              'value' => 'required'
            ]);
            $data = Gallery::findOrFail($id);
            $fileName = $data->value;
            // Check if the existing file is an image
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
            $existingExtension = pathinfo($fileName, PATHINFO_EXTENSION);
          if ($request->key === 'Video' && $existingExtension){
              if (in_array(strtolower($existingExtension), $imageExtensions) && file_exists(public_path('gallery/' . $data->value))) {
                unlink(public_path('gallery/' . $data->value));
              }
              $fileName = $request->input('value');
            }
            if ($request->hasFile('value')) {
                if (file_exists(public_path('gallery/' . $fileName))) {
                    unlink(public_path('gallery/' . $fileName));
                }
                $file = $request->file('value');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
                $file->move("gallery/", $fileName);
            }
            $data->update([
                'key' => $request->input('key'),
                'value' => $fileName
            ]);
            return redirect()->route('gallery-list')->with(['success' => "Gallery Update Successfully"], 200);
        } catch (ValidationException $validationException) {
            return redirect()->back()->with('error', $validationException->getMessage())->withInput();
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }
}
