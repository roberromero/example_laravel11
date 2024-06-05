<?php
namespace App\Http\Controllers;
//FIRST OPTION: use Illuminate\Support\Facades\Gate;
use App\Models\Job;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('employer')->paginate(5);
        return view('jobs.index',
        ['jobs' => $jobs]);
    }
    public function create(){
        return view('jobs.create');
    }
    public function store(){
        request()->validate([
            'title' => 'required|min:3|max:255',
            'salary' => 'required',
        ]);
        Job::create([
            'title' => request()->title,
            'salary' => request()->salary,
            'employer_id' => 1
        ]);
        return redirect('jobs');
    }
    public function show(Job $job){
        return view('jobs.show', ['job'=> $job]);
    }
    public function edit(Job $job){
        //AUTHORIZATION AT THE CONTROLLER LEVEL:
        //FIRST OPTION The gate is defined in the AppServiceProvider.php file
        //FIRST OPTION Gate::authorize('edit-job', $job);
        return view('jobs.edit',['job' => $job]);
    }
    public function update(Job $job){
        //AUTHORIZE (On hold ...)
        //ROUTE MODEL BINDING
        request()->validate([
            'title' => 'required|min:3|max:255',
            'salary' => 'required',
        ]);
        //$job = Job::findOrFail($id);
        // $job->update([
        //     'title' => request('title'),
        //     'salary' => request('salary')
        // ]);
        $job->update(request()->all());
        return redirect('/jobs');
    }
    public function destroy(Job $job){
        //AUTHORIZE (On hold ...)
        //Job::findOrFail($job)->delete();
        $job->delete();
        return redirect('/jobs');
    }
}
