<?php

namespace App\Http\Controllers;

use App\Models\EducationalExperience;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectTechnology;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        return view('frontend.project-list');
    }

    public function projectDetails()
    {
        return view('frontend.project-details');
    }


    public function projectList(Request $request)
    {
        if ($request->ajax()) {

            $data = Project::orderByDesc('id');
            return DataTables::of($data)

                ->addColumn('img',function ($row){
                    if (!empty($row->img)){
                        return '<img src="'.asset('storage/'.$row->img).'" alt="" class="thumb-md rounded-circle">';
                    }else{
                        return '<img src="'.asset('img/no-image.png').'" alt="" class="thumb-md rounded-circle">';
                    }
                })

                ->addColumn('action', function ($row) {
                    $actions = '<div class="d-flex align-items-center">';

                    $checked = $row->status == ACTIVE_STATUS ? 'checked' : '';
                    $actions .= '<div class="form-check form-switch form-switch-success me-2">
                                    <input class="form-check-input" type="checkbox" data-id="' . $row->id . '" onchange="toggleStatus(this)" id="customSwitchSuccess' . $row->id . '" ' . $checked . '>
                                </div>';

                    $actions .= '<a href="'.route('edit-project',$row->id).'" class="me-2"><i class="far fa-edit fa-2x" aria-hidden="true"></i></a>';

                    $actions .= '<i onclick="showSwal(\'passing-parameter-execute-cancel\', \'' . route('delete-project', $row->id) . '\')" class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i>';

                    $actions .= '</div>';

                    return $actions;

                })
                ->rawColumns(['action','img'])
                ->make(true);
        }

        return view('admin.my-projects');
    }

    public function createProject()
    {
        $data['skills']=Skill::where('status',ACTIVE_STATUS)->get();
        return view('admin.create-project',$data);

    }

    public function saveProject(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'tech_stack' => 'required',
            'status' => 'required',
            'description' => 'required',
            'img' => 'required|mimes:jpeg,jpg,png,svg|max:3072',
        ]);

        DB::beginTransaction();

        try {
            $filePath = null;

            // Save main image
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('project', $filename, 'public');
                $filePath = $path;
            }

            // Save project
            $project = Project::create([
                'title' => $request->post('name'),
                'slug' => $request->post('slug'),
                'status' => $request->post('status'),
                'live_url' => $request->post('live_url'),
                'repo_url' => $request->post('repo_url'),
                'img' => $filePath,
                'description' => $request->post('description'),
            ]);

            // Save tech stack
            $stackArray = collect($request->post('tech_stack'))->map(function ($stack) use ($project) {
                return [
                    'project_id' => $project->id,
                    'skill_id' => $stack,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray();

            if (!empty($stackArray)) {
                ProjectTechnology::insert($stackArray);
            }

            // Save additional images
            if ($request->hasFile('image')) {
                $imageArray = [];
                foreach ($request->file('image') as $key  => $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('project', $filename, 'public');

                    $imageArray[] = [
                        'project_id' => $project->id,
                        'image' => $path,
                        'position' => ++$key,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                if (!empty($imageArray)) {
                    ProjectImage::insert($imageArray);
                }
            }

            DB::commit();
            toast('Project saved successfully.','success');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            toast('Something went wrong.','error');
            return redirect()->back();
        }

    }

    public function updateProject(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'tech_stack' => 'required',
            'status' => 'required',
            'description' => 'required',
            'img' => 'nullable|mimes:jpeg,jpg,png,svg|max:3072',
        ]);

//        dd($request->all());
        DB::beginTransaction();

        try {

            $project = Project::with(['images','technology'])->findOrFail($id);

            if(empty($project)){
                abort(404);
            }

            $filePath = $project->img ?? null;

            // Save main image
            if ($request->hasFile('img')) {

                if ($project->img && Storage::disk('public')->exists($project->img)) {
                    Storage::disk('public')->delete($project->img);
                }

                $file = $request->file('img');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('project', $filename, 'public');
                $filePath = $path;
            }

            // Save project
            $project->update([
                'title' => $request->post('name'),
                'slug' => $request->post('slug'),
                'status' => $request->post('status'),
                'live_url' => $request->post('live_url'),
                'repo_url' => $request->post('repo_url'),
                'img' => $filePath,
                'description' => $request->post('description'),
            ]);

            if(!empty($request->post('tech_stack'))){
                ProjectTechnology::where('project_id',$project->id)->delete();
            }

            // Save tech stack
            $stackArray = collect($request->post('tech_stack'))->map(function ($stack) use ($project) {
                return [
                    'project_id' => $project->id,
                    'skill_id' => $stack,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            })->toArray();

            if (!empty($stackArray)) {
                ProjectTechnology::insert($stackArray);
            }

            if($request->hasFile('image')){

                foreach ($request->file('image') as $key  => $file) {

                    $getProjectImage = ProjectImage::where('position',$key)->where('project_id',$project->id)->first();

                    $projectOldImage = $getProjectImage->image;

                    if ($projectOldImage && Storage::disk('public')->exists($projectOldImage)) {
                        Storage::disk('public')->delete($projectOldImage);
                    }

                    $filename = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('project', $filename, 'public');

                    $getProjectImage->update([
                        'image'=>$path
                    ]);
                }
            }

            DB::commit();
            toast('Project updated successfully.','success');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            toast('Something went wrong.','error');
            return redirect()->back();
        }

    }

    public function editProject($id)
    {
        $project = Project::with(['images','technology'])->find($id);

        if(empty($project)){
            abort(404);
        }
        $data['skills']=Skill::where('status',ACTIVE_STATUS)->get();
        $data['project'] = $project;
        $data['selectedSkills'] = $project->technology->pluck('skill_id')->toArray();
        $data['existingImages'] = $project->images->pluck('image','position')->toArray() ?? collect();
//        dd($data);
        return view('admin.edit-project',$data);
    }

    public function deleteWorkProject($id)
    {

        $project = Project::find($id);

        if(empty($project)){
            abort(404);
        }

        $images = ProjectImage::where('project_id',$project->id)->get();

        foreach ($images as $image){

            $projectOldImage = $image->image;

            if ($projectOldImage && Storage::disk('public')->exists($projectOldImage)) {
                Storage::disk('public')->delete($projectOldImage);
            }

            $image->delete();
        }

        ProjectTechnology::where('project_id',$project->id)->delete();

        $project->delete();

        toast('Project deleted successfully.','success');
        return redirect()->back();
    }

    public function updateProjectStatus(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $project->status = $request->status;
        $project->save();

        return response()->json(['message' => 'Status updated']);
    }

}
