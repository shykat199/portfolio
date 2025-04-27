<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('resumes')->orderByDesc('id');
            return DataTables::of($data)
                ->addColumn('preview',function ($row){

                    return '<button data-bs-toggle="modal" data-id ="'.$row->id.'" data-fileUrl="' . (!empty($row->file) ? asset('storage/' . $row->file) : '') . '" data-bs-target="#exampleModal2" class="me-2 btn btn-primary">Preview</button>';

                })
                ->addColumn('action', function ($row) {
                    $actions = '<div class="d-flex align-items-center">';

                    $checked = $row->status == ACTIVE_STATUS ? 'checked' : '';
                    $actions .= '<div class="form-check form-switch form-switch-success me-2">
                                    <input class="form-check-input" type="checkbox" data-id="' . $row->id . '" onchange="toggleUserStatus(this)" id="customSwitchSuccess' . $row->id . '" ' . $checked . '>
                                </div>';

                    $actions .= '<i onclick="showSwal(\'passing-parameter-execute-cancel\', \'' . route('delete-resume', $row->id) . '\')" class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i>';

                    $actions .= '</div>';

                    return $actions;

                })
                ->rawColumns(['action','preview'])
                ->make(true);
        }

        return view('admin.resume-list');
    }

    public function saveResume(Request $request)
    {
        $request->validate([
            'file'=>'required|mimes:pdf|max:3072'
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = Storage::disk('public')->putFileAs('resume', $file, $filename);
            $filePath = $path;
        }

        DB::table('resumes')->insert([
            'file' => $filePath,
            'status' => INACTIVE_STATUS,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        toast('New Resume Added Successfully!','success');

        return redirect()->back();
    }

    public function updateResume(Request $request)
    {
        $request->validate([
            'file'=>'required|mimes:pdf|max:3072'
        ]);

        $resumeId = $request->post('id');

        $resumeData = DB::table('resumes')->where('id',$resumeId)->first();

        if(empty($resumeData)){
            abort(404);
        }

        $filePath = null;

        if ($request->hasFile('file')) {

            if ($resumeData->file && Storage::disk('public')->exists($resumeData->file)) {
                Storage::disk('public')->delete($resumeData->file);
            }

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = Storage::disk('public')->putFileAs('resume', $file, $filename);
            $filePath = $path;
        }

        DB::table('resumes')->where('id',$resumeId)->update([
            'file' => $filePath,
            'updated_at' => now(),
        ]);

        toast('Resume Updated Successfully!','success');

        return redirect()->back();
    }

    public function deleteResume($id)
    {
        $resumes = DB::table('resumes')->where('id',$id)->first();

        if ($resumes->file && Storage::disk('public')->exists($resumes->file)) {
            Storage::disk('public')->delete($resumes->file);
        }

        DB::table('resumes')->where('id',$id)->delete();

        toast('Resume deleted successfully','success');
        return redirect()->back();
    }

    public function updateResumeStatus(Request $request)
    {
        $experience = DB::table('resumes')->where('id',$request->post('portfolio_id'))->first();

        DB::table('resumes')->where('id',$request->post('portfolio_id'))->update([
            'status'=>$request->status,
        ]);

        return response()->json(['message' => 'Status updated']);
    }
}
