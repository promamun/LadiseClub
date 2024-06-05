<?php

namespace App\Http\Controllers\event;

use Exception;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
  public function eventList()
  {
    try {
      $event = Event::get();
      return response()->json(['data' => $event]);
    } catch (Exception $exception) {
      return response()->json(['error' => $exception->getMessage()]);
    }
  }
  public function index()
  {
    try {
      return view('content.event.eventList');
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function addEvent()
  {
    try {
      return view('content.event.eventAdd');
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function editEvent($id)
  {
    try {
      $data = Event::findOrFail($id);
      return view('content.event.eventEdit', compact('data'));
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()])->withInput();
    }
  }

  public function deleteEvent(Request $request)
  {
    try {
      $data = Event::findOrFail($request->id);
      $data->delete();
      return response()->json(['success' => true]);
    } catch (Exception $exception) {
      return response()->json([
        'status' => 'fail',
        'message' => $exception->getMessage()
      ]);
    }
  }

  public function storeEvent(Request $request)
  {
    try {
      // dd($request->all());
      $request->validate([
        'image' => 'required|image',
        'name' => 'required|string',
        'date' => 'required'
      ]);
      $fileName = null;
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName =  date('Ymdhis') . '_' .$file->getClientOriginalName();
        $file->move("event/", $fileName);
      }
      Event::create([
        'name' => $request->input('name'),
        'date' => $request->input('date'),
        'image' => $fileName
      ]);
      return redirect()->route('event-list')->with('message', 'Event Create Successfully');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }

  public function updateEvent(Request $request, $id)
  {
    try {
      $data = Event::findOrFail($id);
      $request->validate([
        'name' => 'required|string',
        'date' => 'required'
      ]);
      $fileName = $data->image;
      if ($request->hasFile('image')) {
        $request->validate([
          'image' => 'required|image'
        ]);
        if (file_exists(public_path('event/' . $fileName))) {
          unlink(public_path('event/' . $fileName));
        }
        $file = $request->file('image');
        $fileName = date('Ymdhis') . '_' .$file->getClientOriginalName();
        $file->move("event/", $fileName);
      }
      $data->update([
        'name' => $request->input('name'),
        'date' => $request->input('date'),
        'image' => $fileName
      ]);
      return redirect()->route('event-list')->with('message', 'Event Update Successfully');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }
}
