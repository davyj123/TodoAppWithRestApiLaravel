<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(Request $request){
        $add = new Task();
        $add->user_id = $request->user_id;
        $add->task = $request->task;
        $add->status = "pending";
        $add->save();
        return response()->json(['status'=>true,'message'=>'Successfully created a task','id'=>$add->id,'user_id'=>$add->user_id,'task'=>$add->task,'status'=>$add->status]);
    }
    public function Update(Request $request){
        $update = Task::find($request->id);
        $update->status = $request->status;
        if($update->save())
        {
            return response()->json(['id'=>$request->id,'task'=>$update->task,'message'=>'Task marked as '.$request->status]);
        } 
        else{
            return response()->json($update);
        }        
        
    }
    public function getUserTask(Request $request){
        $users = Task::select('id','task')->where('user_id',$request->user_id)->where('status',$request->status)->get();
        return response()->json($users);
    }
    public function DeleteTask(Request $request)
    {
        $delete = Task::where('id',$request->id)->delete();
        return $delete;
    }
}
