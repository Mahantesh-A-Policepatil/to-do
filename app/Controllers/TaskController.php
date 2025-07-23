<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    public function index()
	{
	    $taskModel = new \App\Models\TaskModel();

	    $data = [
	        'tasks' => $taskModel->paginate(10), // Show 10 per page
	        'pager' => $taskModel->pager
	    ];

	    return view('tasks/index', $data);
	}

    public function create()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        return view('tasks/create');
    }

    public function store()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        $model = new TaskModel();

        $model->save([
            'title' => $this->request->getPost('title')
        ]);

        return redirect()->to('/tasks')->with('success', 'Task created successfully!');
    }

    public function edit($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        $model = new TaskModel();
        $data['task'] = $model->find($id);

        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        $model = new TaskModel();

        $model->update($id, [
            'title' => $this->request->getPost('title')
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated successfully!');
    }

    public function delete($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        $model = new TaskModel();
        $model->delete($id);

        return redirect()->to('/tasks')->with('success', 'Task deleted successfully!');
    }
}


