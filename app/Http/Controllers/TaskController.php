<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use App\Service\HistoryTask\HistoryTask;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function index()
    {
        $tasks = Task::query()->
        select('title', 'content','tasks.created_at','tasks.id','name')->
        Join('users','creator_id','=','users.id')->get();
                  return view('tasks-list',[
                  'tasks'=>$tasks
              ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function create()
    {
        $users=User::query()->get();
        return view('task-form',['users' => $users]) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|string
     */
    public function store(HistoryTask $historytask,Request $request)
    {
        $request->validate([
                'title' => 'required|string|max:100|min:5',
                'content' => 'required|string|max:1000|min:5',
                'user_id' => 'required|numeric|max:20'
        ]);
        $date = date("Y-m-d H:i:s");
        $task = new Task();
        $task->title = $request->post('title');
        $task->creator_id = $request->post('user_id');
        $task->content = $request->post('content');
        $task->status_id = 1;
        $task->updated_at = $date;
        $task->created_at = $date;
        $task->save();
        $historytask->saveHistoryTask($task->id, $task);
        // \App\Service\HistoryTask\Facade\HistoryTask::saveHistoryTask($task->id,$arr);
        return redirect(route('tasks.index'));;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function show($id)
    {
        return 'Просмотр задания id = ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function edit($id)
    {
        $users = User::query()->get();
        $statuses = Status::query()->get();
        $task = Task::query()->where('id',$id)->first();
        return view('edit-task-form',[
            'users' => $users,
            'statuses' => $statuses,
            'task' => $task
        ]) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function update(HistoryTask $historytask,Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|max:1000|min:5',
            'user_id' => 'required|numeric|max:20',
            'status_id' => 'required|numeric|max:3'
        ]);
        $task = Task::query()->where('id',$id)->first();
        $task->title = $request->post('title');
        $task->creator_id = $request->post('user_id');
        $task->content = $request->post('content');
        $task->status_id = $request->post('status_id');
        $task->updated_at =  date("Y-m-d H:i:s");
        $task->save();
        $historytask->saveHistoryTask($id, $task);
        // \App\Service\HistoryTask\Facade\HistoryTask::saveHistoryTask($task->id,$arr);
        return redirect(route('tasks.index'));;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function destroy($id)
    {
        return 'Задание ' . $id . ' удалено';
    }
}
