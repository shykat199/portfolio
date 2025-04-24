<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class WorkExperienceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = WorkExperience::orderByDesc('id');
            return DataTables::of($data)

                ->addColumn('action', function ($row) {
                    $actions = '<div class="d-flex align-items-center">';

                    $checked = $row->status == ACTIVE_STATUS ? 'checked' : '';
                    $actions .= '<div class="form-check form-switch form-switch-success me-2">
                                    <input class="form-check-input" type="checkbox" data-id="' . $row->id . '" onchange="toggleStatus(this)" id="customSwitchSuccess' . $row->id . '" ' . $checked . '>
                                </div>';

                    $actions .= '<a href="'.route('edit-experience',$row->id).'" data-id="'.$row->id.'" data-name="'.$row->name.'" data-percentage="'.$row->percentage.'" data-status="'.$row->status.'" data-logo="'.(!empty($row->logo) ? asset('storage/'.$row->logo) : asset('img/no-image.png')).'" class="me-2"><i class="far fa-edit fa-2x" aria-hidden="true"></i></a>';

                    $actions .= '<i onclick="showSwal(\'passing-parameter-execute-cancel\', \'' . route('delete-experience', $row->id) . '\')" class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i>';

                    $actions .= '</div>';

                    return $actions;

                })
                ->rawColumns(['action','description'])
                ->make(true);
        }

        return view('admin.work-experience');

    }

    public function createExperience()
    {
        return view('admin.create-experience');
    }
    public function saveExperience(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'position'=>'required',
            'status'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required',
        ]);

        WorkExperience::create([
            'company_name'=>$request->post('name'),
            'position'=>$request->post('position'),
            'status'=>$request->post('status'),
            'start_date'=>$request->post('start_date'),
            'end_date'=>$request->post('end_date'),
            'description'=>$request->post('description'),
        ]);

        toast('Work Experience Created Successfully','success');

        return redirect()->back();
    }
    public function updateExperience(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'position'=>'required',
            'status'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required',
        ]);

        $experience = WorkExperience::find($id);

        if (empty($experience)){
            abort(404);
        }

        $experience->update([
            'company_name'=>$request->post('name'),
            'position'=>$request->post('position'),
            'status'=>$request->post('status'),
            'start_date'=>$request->post('start_date'),
            'end_date'=>$request->post('end_date'),
            'description'=>$request->post('description'),
        ]);

        toast('Work Experience Updated Successfully','success');

        return redirect()->back();
    }

    public function editWorkExperience($id)
    {
        $experience = WorkExperience::find($id);
        if (empty($experience)){
            abort(404);
        }
        $data['experience'] = $experience;

        return view('admin.edit-experience',$data);
    }

    public function deleteWorkExperience($id)
    {
        $experience = WorkExperience::find($id);

        if (empty($experience)){
            abort(404);
        }

        $experience->delete();

        toast('Experience deleted successfully','success');
        return redirect()->back();
    }

    public function updateExperienceStatus(Request $request)
    {
        $experience = WorkExperience::findOrFail($request->skill_id);
        $experience->status = $request->status;
        $experience->save();

        return response()->json(['message' => 'Status updated']);
    }

}
