<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\ContactUs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SettingsController extends Controller
{
  public function globalSettings()
  {
    try {
      return view('content.settings.globalSettings');
    } catch (Exception $e) {
      return response()->json(['error' => $e->getMessage()]);
    }
  }
  public function aboutUs()
  {
    try {
      $aboutUs = AboutUs::first();
      return view('content.settings.aboutUs',compact('aboutUs'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }
  public function contactUs()
  {
    try {
      $contactUs = ContactUs::first();
      return view('content.settings.contactUs',compact('contactUs'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }
  public function storeAboutUs(Request $request)
  {
    try {
      $request->validate([
          'name' => 'required|string',
          'title' => 'required|string',
          'image' => 'sometimes|image', // 'required' replaced with 'sometimes' to allow updates without an image
          'description' => 'required|string'
      ]);

      $aboutUs = AboutUs::first();
      $fileName = $aboutUs ? $aboutUs->image : null;

      if ($request->hasFile('image')) {
          $file = $request->file('image');
          $fileName = $file->getClientOriginalName() . '_' . date('Ymdhis') . '.' . $file->getClientOriginalExtension();
          $file->move(public_path('aboutUs'), $fileName);
      }

      $data = [
          'name' => $request->input('name'),
          'title' => $request->input('title'),
          'description' => $request->input('description'),
          'image' => $fileName,
      ];

      if ($aboutUs) {
          $aboutUs->update($data);
      } else {
          AboutUs::create($data);
      }

      return redirect()->back()->with('success', 'About Us information saved successfully');
  } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }
  public function storeContactUs(Request $request)
  {
    try {
      $request->validate([
          'name' => 'nullable|string',
          'title' => 'nullable|string',
          'email' => 'nullable|email', // 'required' replaced with 'sometimes' to allow updates without an image
          'phone' => 'nullable|string',
          'address' => 'nullable|string',
          'location' => 'nullable|url',
          'description' => 'nullable|string',
      ]);

      $contactUs = ContactUs::first();

      $data = [
          'name' => $request->input('name'),
          'title' => $request->input('title'),
          'email' => $request->input('email'),
          'phone' => $request->input('phone'),
          'address' => $request->input('address'),
          'location' => $request->input('location'),
          'description' => $request->input('description'),
      ];

      if ($contactUs) {
          $contactUs->update($data);
      } else {
        ContactUs::create($data);
      }

      return redirect()->back()->with('success', 'Contact Us information saved successfully');
  } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }
}
