<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Member;

use Illuminate\Http\Request;

use App\Models\MemberCategory;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Casts\Json;
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
          $memberCategory = MemberCategory::all();
            return view("content.member.memberadd", compact('memberCategory'));
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    public function editMember($id)
    {
        try {
            $data = Member::with('members')->findOrFail($id);
            $memberCategory = MemberCategory::all();
            return view("content.member.memberEdit", compact(['data', 'memberCategory']));
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    public function deleteMember(Request $request)
    {
        try {
            $data = Member::findOrFail($request->id);
            $data->members()->detach();
            $data->delete();
            return response()->json(['success' => true]);
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'fail',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function storeMember(Request $request)
    {
      try {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'designation' => 'required|string',
            'image' => 'required',
            'category_id' => 'required|array',
            'description' => 'nullable|string|min:10|max:50',
            'phone' => 'nullable|string|min:11|max:14',
            'mobile' => 'nullable|string|min:11|max:14',
            'fax' => 'nullable|string',
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'personal_website' => ['nullable', 'url'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(['error'=>$validator->getMessageBag()])->withInput();
        }

        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->move("member/", $fileName);
        }
        $member=Member::create([
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
        $member->members()->attach($request->input('category_id'));
        return redirect()->route('member-list')->with(['success'=>"Member Create Successfully"],200);
    } catch (Exception $exception) {
      return redirect()->back()->with(['error'=> $exception->getMessage()])->withInput();
    }
  }
  public function updateMember(Request $request, $id)
  {
    try {
      $data = Member::find($id);
      $request->validate([
        'name' => 'required|string',
        'designation' => 'required|string',
        'category_id' => 'required|array',
        'description' => 'nullable|string|min:10|max:50',
        'phone' => 'nullable|string|min:11|max:14',
        'mobile' => 'nullable|string|min:11|max:14',
        'fax' => 'nullable|string',
        'facebook' => ['nullable', 'url'],
        'twitter' => ['nullable', 'url'],
        'linkedin' => ['nullable', 'url'],
        'instagram' => ['nullable', 'url'],
        'personal_website' => ['nullable', 'url'],
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
      $data->members()->sync($request->input('category_id'));
      return redirect()->route('member-list')->with(['success'=>"Member Update Successfully"],200);
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
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
        'name' => $request->input('name')
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
        'name' => $request->input('name')
      ]);
      return redirect()->route('memberCategory-list');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage());
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage());
    }
  }
}

