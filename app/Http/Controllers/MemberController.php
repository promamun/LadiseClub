<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Member;

use App\Models\MemberCategory;

use Illuminate\Database\Eloquent\Casts\Json;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
    public function membersList(){
      try{
        $members = Member::get();
        return response()->json(['data' => $members]);
      }catch(Exception $exception){
        return response()->json(['error'=>$exception->getMessage()]);
      }
    }
    public function index()
    {
        try {
            return view('content.member.memberlist');
        } catch (Exception $exception) {
            return redirect()->back()->with(['error' =>$exception->getMessage()]);
        }
    }

    public function addMember()
    {
        try {
            return view("content.member.memberadd");
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    public function editMember($id)
    {
        try {
            $data = Member::find($id);
            return view("content.member.memberEdit", compact('data'));
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    public function deleteMember(Request $request)
    {
        try {
            $data = Member::findOrFail($request->id);
            $data->delete();
            return response()->json(['success' => true]);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'fail',
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function storeMember(Request $request)
    {
      try {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'designation' => 'required|string',
            'image' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->move("member/", $fileName);
        }
        Member::create([
            'name' => $request->input('name'),
            'designation' => $request->input('designation'),
            'image' => $fileName,
            'description' => $request->input('description'),
            'phone' => $request->input('phone'),
            'mobile' => $request->input('mobile'),
            'fax' => $request->input('fax'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'linkedin' => $request->input('linkedin'),
            'instagram' => $request->input('instagram'),
            'personal_website' => $request->input('personal_website'),
        ]);
        return redirect()->route('member-list');
    } catch (Exception $exception) {
      return redirect()->back();
    }
  }
  public function updateMember(Request $request, $id)
  {
    try {
      $data = Member::find($id);
      $request->validate([
        'name' => 'required|string',
        'designation' => 'required|string'
      ]);
      $fileName = $data->image;
      if ($request->hasFile('image')) {
        $request->validate([
          'image' => 'required'
        ]);
        // Delete the old image file
        if (file_exists(public_path('member/' . $fileName))) {
          unlink(public_path('member/' . $fileName));
        }
        $file = $request->file('image');
        $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move("member/", $fileName);
      }
      $data->Update([
        'name' => $request->input('name'),
        'designation' => $request->input('designation'),
        'image' => $fileName,
        'description' => $request->input('description'),
        'phone' => $request->input('phone'),
        'mobile' => $request->input('mobile'),
        'fax' => $request->input('fax'),
        'facebook' => $request->input('facebook'),
        'twitter' => $request->input('twitter'),
        'linkedin' => $request->input('linkedin'),
        'instagram' => $request->input('instagram'),
        'personal_website' => $request->input('personal_website'),
      ]);
      return redirect()->route('member-list');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage());
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage());
    }
  }
  //member Category

  public function memberCategoryList(){
    try{
      $memberCategories = MemberCategory::get();
      return response()->json(['data' => $memberCategories]);
    }catch(Exception $exception){
      return response()->json(['error'=>$exception->getMessage()]);
    }
  }
  public function MemberCategory()
  {
    try {
      return view('content.memberCategory.memberCategoryList');
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' =>$exception->getMessage()]);
    }
  }

  public function addMemberCategory()
  {
    try {
      return view('content.memberCategory.memberCategoryAdd');
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' =>$exception->getMessage()]);
    }
  }

  public function editMemberCategory($id)
  {
    try {
      $data = MemberCategory::find($id);
      return view('content.memberCategory.memberCategoryEdit', compact('data'));
    } catch (Exception $exception) {
      return redirect()->back();
    }
  }

  public function deleteMemberCategory(Request $request)
  {
    try {
      $data = MemberCategory::findOrFail($request->id);
      $data->delete();
      return response()->json(['success' => true]);
    } catch (Exception $exception) {
      return response()->json([
        'status' => 'fail',
        'message' => $exception->getMessage()
      ]);
    }
  }

  public function storeMemberCategory(Request $request)
  {
    try {
      // dd($request->all());
      $request->validate([
        'name' => 'required|string'
      ]);
      MemberCategory::create([
        'name' => $request->input('name'),
        'status' => $request->input('status')
      ]);
      return redirect()->route('memberCategory-list');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage());
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage());
    }
  }

  public function updateMemberCategory(Request $request, $id)
  {
    try {
      $data = MemberCategory::findOrFail($id);
      $request->validate([
        'name' => 'required|string'
      ]);
      $data->Update([
        'name' => $request->input('name'),
        'status' => $request->input('status')
      ]);
      return redirect()->route('memberCategory-list');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage());
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage());
    }
  }
}

