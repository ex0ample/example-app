<?php

namespace App\Http\Controllers;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ดึงข้อมูล ในตาราง Todo 5 เรคคอร์ด ล่าสุด มาเก็บไว้ใน $todos
        $todos = Todo::latest()->paginate(5);
        
        //นำข้อมูลใน $todos ส่งไปแสดงในหน้า Views>todos>index.blade.php
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoStoreRequest $request)
    {
        Todo::create($request->validated());

        return redirect()->route('todo.create')->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
