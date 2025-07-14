<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    public function index()
    {
        $model = new TaskModel();
        $data['tasks'] = $model->findAll();

        return view('tasks/index', $data);
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $model = new TaskModel();

        $model->save([
            'title' => $this->request->getPost('title')
        ]);

        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $model = new TaskModel();
        $data['task'] = $model->find($id);

        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $model = new TaskModel();

        $model->update($id, [
            'title' => $this->request->getPost('title')
        ]);

        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $model = new TaskModel();
        $model->delete($id);

        return redirect()->to('/tasks');
    }
}


