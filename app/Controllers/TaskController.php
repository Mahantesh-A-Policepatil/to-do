<?php

namespace App\Controllers;

use App\Models\Task;

class TaskController extends BaseController
{
    public function index()
    {
        $model = new Task();
        $data['tasks'] = $model->findAll();
        return view('task_view', $data);
    }

    public function store()
    {
        $model = new Task();
        $model->save([
            'title' => $this->request->getPost('title'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->to('/');
    }
}
