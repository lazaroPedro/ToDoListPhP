<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskManager extends Controller
{
    public function create(){
        return view("tasks.create");
    }
    public function createPost(Request $request){
        $request->validate([
            "title" => "required",
            "datetime" => "required",
            "description" => "required"
        ]);
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->date_meta = $request->datetime;

        if($task->save()){
            return redirect(route("home"))->with("success", "Tarefa Criada");
        }
        return redirect(route("tasks.create.post"))->with("error", "Dados Incorretos");

    }

    public function getAll(){
        $request = Task::all();
        return view("welcome", ["tasks" => $request]);
    }
    public function taskUpdateStatus(Request $request){
        if ($request->has('checked')) {
            $check = $request->input("checked");
            $id = $request->id;
        if(Task::where("id", $id)->update(["is_done"=> $check])){
            return redirect(route("home"))->with("success", "Tarefa Atualizada");
        }}
        return redirect(route("home"))->with("errors", "Erro ao atualizar");
    }
    public function taskDelete(Request $request){
        $id = $request->id;
        if(Task::where("id", $id)->delete()){
            return redirect(route("home"))->with("success", "Tarefa Atualizada");
        }
        return redirect(route("home"))->with("errors", "Erro ao atualizar");

    }
}
