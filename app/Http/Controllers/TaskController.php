<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Exception;

class TaskController extends Controller
{

    public function index()
    {
        $tarefas = Task::byUserAuth()->latest()->paginate(7);

        //dd($tarefas);
        return Inertia::render('Dashboard', [
            'tasks' => $tarefas,
            'titulo' => 'Todas as Tarefas'

        ]);


    }

    public function store(TaskFormRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();
        Task::create([
            "title" => $data['titulo'],
            "description" => $data['descricao'],
            "date" => $data["dataTarefa"],
            "user_id" => $user->id,
            "is_completed" => $data["completa"],
            "is_important" => $data["importante"]
        ]);
    }

    public function update(TaskFormRequest $request, Task $tarefa)
    {
        $data = $request->all();

        if ($tarefa->isFromAuthUser()) {

            $user = Auth::user();
            $tarefa->update([
                "title" => $data['titulo'],
                "description" => $data['descricao'],
                "date" => $data["dataTarefa"],
                "user_id" => $user->id,
                "is_completed" => $data["completa"],
                "is_important" => $data["importante"]
            ]);

        } else {
            return back()->withErrors('Não foi possível ');
        }


    }

    public function destroy(Task $tarefa)
    {
        if ($tarefa->isFromAuthUser()) {

            $tarefa->delete();
        } else {
            return back()->withErrors('Não foi possível ');
        }

    }

    public function changeStatusCompleted(Task $tarefa)
    {

        $statusParaALternar = !$tarefa->is_completed;
        $tarefa->is_completed = $statusParaALternar;
        $tarefa->save();

    }


    public function tasksImportants()
    {
        $tarefas = Task::byUserAuth()->whereImportant()->latest()->paginate(7);

        //dd($tarefas);
        return Inertia::render('Dashboard', [
            'tasks' => $tarefas,
            'titulo' => 'Tarefas Importantes'

        ]);


    }
    public function tasksCompleteds()
    {
        $tarefas = Task::byUserAuth()->whereCompleted()->latest()->paginate(7);

        //dd($tarefas);
        return Inertia::render('Dashboard', [
            'tasks' => $tarefas,
            'titulo' => 'Tarefas Completadas'

        ]);


    }
}
