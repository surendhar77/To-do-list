<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class TasksController extends Controller
{
	/**
	 * The task repository instance.
	 *
	 * @var TaskRepository
	 */
	protected $tasks;

	/**
	 * Create a new controller instance.
	 *
	 * @param TaskRepository $tasks
	 * @return void
	 */
	public function __construct(TaskRepository $tasks)
	{
		$this->middleware('auth');

		$this->tasks = $tasks;
	}

	/**
	 * Display a list of all of the user's task.
	 *
	 * @param  Request  $request
	 * @return Response
	 */

	 public function create(Request $request)
	 {
		return view('tasks.create');
	 }
	public function index(Request $request)
	{
		
		
		$tasks = $this->tasks->getByUser($request->user());
		
		return view('tasks.index',compact('tasks'));
	}

	/**
	 * Create a new task.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:255',
			'description' =>'required'
		]);

		$request->user()->tasks()->create([
			'title' => $request->title,
			'description' => $request->description
		]);
        Alert::success('Item is added Successfully', '');
		return redirect()->route('home');
	}

	/**
	 * Destroy the given task.
	 * 
	 * @param Request $request
	 * @param Task $task
	 * @return Response
	 */
	public function destroy(Request $request, Task $task)
	{
		$this->authorize('destroy', $task);

		$task->delete();
		Alert::info('Deleted Successfully', '');	
		return back();
	}

	/**
	 * Toggle task's done status.
	 * 
	 * @param Request $request
	 * @param Task $task
	 * @return Response
	 */
	public function toggleDoneStatus(Request $request, Task $task)
	{
		$this->authorize('toggleDoneStatus', $task);

		$task->status = !$task->status;
		$task->save();
		if($task->status == 0)
		{
			Alert::warning('Task is Incompleted', '');

		}
		else
		{
			Alert::success('Task is completed', '');
		}

		return back();
	}



	public function update(Request $request,$id)
	{
		$this->validate($request, [
			'title' => 'required|max:255',
			'description' =>'required'
		]);
		$tasks = Task::where('id',$id)->update([

			'title' => $request->title,
			'description' => $request->description
		]);
		Alert::success(' Item is updated Successfully!');		
		return redirect()->route('home');
	
	}

	public function edit(Request $request,$id)
	{
		$tasks = Task::find($id);
		return view('tasks.edit',compact('tasks'));
	}

	public function filterCompletedStatus(Request $request)
	{
		$tasks=Task::where([['status','1'],['user_id',Auth::id()]])->paginate(5);
		 return view('tasks.filter',compact('tasks'));
	}
	public function filterInCompletedStatus(Request $request)
	{
		$tasks=Task::where([['status','0'],['user_id',Auth::id()]])->paginate(5);
		 return view('tasks.filter',compact('tasks'));
	}



	public function show(Request $request)
	{
      	$tasks = Task::where('user_id',Auth::id())->get();
		return view('tasks.show',compact('tasks'));
	}
}
