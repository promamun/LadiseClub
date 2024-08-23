<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Member;

use Illuminate\Http\Request;

use App\Models\MemberCategory;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
  //member Category
  public function memberCategoryList()
  {
    try {
      $memberCategories = MemberCategory::get();
      return response()->json(['data' => $memberCategories]);
    } catch (Exception $exception) {
      return response()->json(['error' => $exception->getMessage()]);
    }
  }
  public function MemberCategory()
  {
    try {
      return view('content.memberCategory.memberCategoryList');
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()]);
    }
  }

  public function addMemberCategory()
  {
    try {
      return view('content.memberCategory.memberCategoryAdd');
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()]);
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
      $request->validate([
        'name' => 'required|string'
      ]);
      MemberCategory::create([
        'name' => $request->input('name'),
        'slug' => Str::slug($request->input('name'))
      ]);
      return redirect()->route('memberCategory-list')->with('success', 'Member Category Create Successfully');
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
        'slug' => Str::slug($request->input('name'))
      ]);
      return redirect()->route('memberCategory-list')->with('success', 'Member Category Update Successfully');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage());
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage());
    }
  }
  public function membersList()
  {
    try {
      $members = Member::get();
      return response()->json(['data' => $members]);
    } catch (Exception $exception) {
      return response()->json(['error' => $exception->getMessage()]);
    }
  }
  public function index()
  {
    try {
      return view('content.member.memberlist');
    } catch (Exception $exception) {
      return redirect()->back()->with(['error' => $exception->getMessage()]);
    }
  }

  public function addMember()
  {
    try {
      $memberCategory = MemberCategory::all();
      return view("content.member.memberAdd", compact('memberCategory'));
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
      if ($data->image) {
        if (file_exists(public_path('member/' . $data->image))) {
          unlink(public_path('member/' . $data->image));
        }
      }
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
      $request->validate([
        'member_id' => 'nullable|string',
        'company_name' => 'nullable|string',
        'address' => 'nullable|string',
        'name' => 'required|string',
        'email' => 'nullable|email',
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
        'phone_is_active' => ['nullable', 'boolean'],
      ]);
      $fileName = null;
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move("member/", $fileName);
      }
      $member = Member::create([
        'member_id' => $request->input('member_id'),
        'company_name' => $request->input('company_name'),
        'address' => $request->input('address'),
        'name' => $request->input('name'),
        'email' => $request->input('email'),
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
        'phone_is_active' => isset($request->phone_is_active) ? $request->phone_is_active : 0,
      ]);
      $member->members()->attach($request->input('category_id'));
      return redirect()->route('member-list')->with('success', 'Member Create Successfully');
    } catch (ValidationException $e) {
      return redirect()->back()->with(['error' => $e->getMessage()])->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }
  public function updateMember(Request $request, $id)
  {
    try {

      $request->validate([
        'company_name' => 'nullable|string',
        'member_id' => 'nullable|string',
        'address' => 'nullable|string',
        'email' => 'nullable|string',
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
        'phone_is_active' => ['nullable', 'boolean'],
      ]);
      $data = Member::find($id);
      $fileName = $data->image;
      if ($request->hasFile('image')) {
        $request->validate([
          'image' => 'required'
        ]);
        // Delete the old image file only if it's a file and exists
        if (!empty($fileName) && is_file(public_path('member/' . $fileName))) {
          unlink(public_path('member/' . $fileName));
        }
        $file = $request->file('image');
        $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
        $file->move("member/", $fileName);
      }
      $data->Update([
        'company_name' => $request->input('company_name'),
        'member_id' => $request->input('member_id'),
        'address' => $request->input('address'),
        'name' => $request->input('name'),
        'email' => $request->input('email'),
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
        'phone_is_active' => isset($request->phone_is_active) ? $request->phone_is_active : 0,
      ]);
      $data->members()->sync($request->input('category_id'));
      return redirect()->route('member-list')->with('success', 'Member Update Successfully');
    } catch (ValidationException $validationException) {
      return redirect()->back()->with('error', $validationException->getMessage())->withInput();
    } catch (Exception $exception) {
      return redirect()->back()->with('error', $exception->getMessage())->withInput();
    }
  }
}
