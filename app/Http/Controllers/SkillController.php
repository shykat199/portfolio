<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $skillCount = Skill::count();
        if ($request->ajax()) {
            $data = Skill::orderByRaw('ISNULL(rank), rank ASC');
            return DataTables::of($data)
                ->addColumn('logo',function ($row){
                    if (!empty($row->logo)){
                        return '<img src="'.asset('storage/'.$row->logo).'" alt="" class="thumb-md rounded-circle">';
                    }else{
                        return '<img src="'.asset('img/no-image.png').'" alt="" class="thumb-md rounded-circle">';
                    }
                })

                ->addColumn('rank', function ($row) use ($skillCount) {
                    $rankDropDown = '<select name="rank" class="form-select rank-select" data-id="'.$row->id.'">';

                    $rankDropDown .= '<option value="">Select Rank</option>';
                    for ($i = 1; $i <= $skillCount; $i++) {
                        $rankDropDown .= '<option value="'.$i.'" '.($row->rank === $i ? 'selected' : '').'>'.$i.'</option>';
                    }

                    $rankDropDown .= '</select>';

                    return $rankDropDown;
                })

                ->addColumn('action', function ($row) {
                        $actions = '<div class="d-flex align-items-center">';

                        $checked = $row->status == ACTIVE_STATUS ? 'checked' : '';
                        $actions .= '<div class="form-check form-switch form-switch-success me-2">
                                        <input class="form-check-input" type="checkbox" data-id="' . $row->id . '" onchange="toggleUserStatus(this)" id="customSwitchSuccess' . $row->id . '" ' . $checked . '>
                                    </div>';

                        $actions .= '<a href="javascript:void(0)" onclick="updateModal(this)" data-id="'.$row->id.'" data-name="'.$row->name.'" data-percentage="'.$row->percentage.'" data-status="'.$row->status.'" data-logo="'.(!empty($row->logo) ? asset('storage/'.$row->logo) : asset('img/no-image.png')).'" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="me-2"><i class="far fa-edit fa-2x" aria-hidden="true"></i></a>';

                        $actions .= '<i onclick="showSwal(\'passing-parameter-execute-cancel\', \'' . route('delete-skill', $row->id) . '\')" class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i>';

                        $actions .= '</div>';

                        return $actions;

                    })
                    ->rawColumns(['action','logo','rank'])
                    ->make(true);
        }

        return view('admin.skill-list');
    }

    public function addSkill(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'percentage'=>'required',
            'status'=>'required',
            'logo'=>'required|mimes:jpeg,jpg,png,svg|max:3072',
        ]);

        $filePath = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = Storage::disk('public')->putFileAs('skill', $file, $filename);
            $filePath = $path;
        }

        Skill::create([
           'name'=>$request->post('name'),
           'percentage'=>$request->post('percentage'),
           'status'=>$request->post('status'),
           'logo'=>$filePath,
        ]);

        toast('New Skill Added Successfully!','success');

        return redirect()->back();

    }

    public function updateSkill(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'percentage'=>'required',
            'status'=>'required',
            'logo'=>'nullable|mimes:jpeg,jpg,png,svg|max:3072',
        ]);

        $id = $request->post('id');

        $skill = Skill::find($id);

        $filePath = $skill->logo ?? null;

        if ($request->hasFile('logo')) {

            if ($skill->logo && Storage::disk('public')->exists($skill->logo)) {
                Storage::disk('public')->delete($skill->logo);
            }

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = Storage::disk('public')->putFileAs('skill', $file, $filename);
            $filePath = $path;
        }

        $skill->update([
            'name'=>$request->post('name'),
            'percentage'=>$request->post('percentage'),
            'status'=>$request->post('status'),
            'logo'=>$filePath,
        ]);

        toast('Skill updated successfully!','success');

        return redirect()->back();

    }

    public function deleteSkill($id)
    {
        $skill = Skill::find($id);

        if ($skill->logo && Storage::disk('public')->exists($skill->logo)) {
            Storage::disk('public')->delete($skill->logo);
        }

        $skill->delete();

        toast('Skill deleted successfully','success');
        return redirect()->back();
    }

    public function updateSkillStatus(Request $request)
    {
        $skill = Skill::findOrFail($request->skill_id);
        $skill->status = $request->status;
        $skill->save();

        return response()->json(['message' => 'Status updated']);
    }

    public function updateSkillRank(Request $request)
    {
        $skill = Skill::findOrFail($request->id);
        $skill->rank = $request->rank;
        $skill->save();

        return response()->json([
            'status' => true,
            'message' => 'Rank updated successfully',
        ]);
    }

}
