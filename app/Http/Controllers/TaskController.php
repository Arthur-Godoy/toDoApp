<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        if(auth()->user()){
            $user = auth()->user();
            $order = request('order');
            switch($order){
                case(null):
                    $tasks = Task::all()->where('user_id',$user->id);
                    $actives = count(Task::all()->where('state', 0));
                    break;
                case('actives'):
                    $tasks = Task::all()->where('state', 0);
                    $actives = count($tasks);
                    break;
                case('concluded'):
                    $tasks = Task::all()->where('state', 1);
                    $actives = 0;
                    break;
            }
            return view('welcome', ['tasks' => $tasks, 'actives' => $actives, 'order' => $order, 'user' => $user]);
        }
        return view('welcome', ['tasks' => [], 'actives' => 0, 'order' => null]);
    }

    public function destroy($id){
        Task::findOrFail($id)->delete();
        return redirect('/');
    }

    public function destroyAll(){
        Task::where('state', 1)->delete();
        return redirect('/');
    }

    public function store(Request $request){
        $task = new Task;
        $task->content = $request->content;
        $task->state = false;
        $task->user_id = auth()->user()->id;
        $task->save();
        return redirect('/');
    }

    public function update($id, Request $request){
        $task = Task::findOrfail($id);
        if($request->$id == 'on'){
            $task->state = 1;
        }else{
            $task->state = 0;
        }
        $task->update();

        return redirect('/');
    }

    public function dashboard(){
        return redirect('/');
    }
}
