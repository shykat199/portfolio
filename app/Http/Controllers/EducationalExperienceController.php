<?php

namespace App\Http\Controllers;

use App\Models\EducationalExperience;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EducationalExperienceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = EducationalExperience::orderByDesc('id');
            return DataTables::of($data)

                ->addColumn('action', function ($row) {
                    $actions = '<div class="d-flex align-items-center">';

                    $checked = $row->status == ACTIVE_STATUS ? 'checked' : '';
                    $actions .= '<div class="form-check form-switch form-switch-success me-2">
                                    <input class="form-check-input" type="checkbox" data-id="' . $row->id . '" onchange="toggleStatus(this)" id="customSwitchSuccess' . $row->id . '" ' . $checked . '>
                                </div>';

                    $actions .= '<a href="'.route('edit-education',$row->id).'" data-id="'.$row->id.'" data-name="'.$row->name.'" data-percentage="'.$row->percentage.'" data-status="'.$row->status.'" data-logo="'.(!empty($row->logo) ? asset('storage/'.$row->logo) : asset('img/no-image.png')).'" class="me-2"><i class="far fa-edit fa-2x" aria-hidden="true"></i></a>';

                    $actions .= '<i onclick="showSwal(\'passing-parameter-execute-cancel\', \'' . route('delete-education', $row->id) . '\')" class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i>';

                    $actions .= '</div>';

                    return $actions;

                })
                ->rawColumns(['action','description'])
                ->make(true);
        }

        return view('admin.education-experience');

    }

    public function createEducation()
    {
        return view('admin.create-education-experience');
    }
    public function saveEducation(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'position'=>'required',
            'status'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required',
        ]);

        EducationalExperience::create([
            'college_name'=>$request->post('name'),
            'position'=>$request->post('position'),
            'status'=>$request->post('status'),
            'start_date'=>$request->post('start_date'),
            'end_date'=>$request->post('end_date'),
            'description'=>$request->post('description'),
        ]);

        toast('Education Experience Created Successfully','success');

        return redirect()->back();
    }
    public function updateEducation(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'position'=>'required',
            'status'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required',
        ]);

        $experience = EducationalExperience::find($id);

        if (empty($experience)){
            abort(404);
        }

        $experience->update([
            'college_name'=>$request->post('name'),
            'position'=>$request->post('position'),
            'status'=>$request->post('status'),
            'start_date'=>$request->post('start_date'),
            'end_date'=>$request->post('end_date'),
            'description'=>$request->post('description'),
        ]);

        toast('Education Experience Updated Successfully','success');

        return redirect()->back();
    }

    public function editEducation($id)
    {
        $experience = EducationalExperience::find($id);
        if (empty($experience)){
            abort(404);
        }
        $data['experience'] = $experience;

        return view('admin.edit-education-experience',$data);
    }

    public function deleteWorkEducation($id)
    {
        $experience = EducationalExperience::find($id);

        if (empty($experience)){
            abort(404);
        }

        $experience->delete();

        toast('Experience deleted successfully','success');
        return redirect()->back();
    }

    public function updateEducationStatus(Request $request)
    {
        $experience = EducationalExperience::findOrFail($request->skill_id);
        $experience->status = $request->status;
        $experience->save();

        return response()->json(['message' => 'Status updated']);
    }
}
