<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ดึงข้อมูล ในตาราง Todo 5 เรคคอร์ด ล่าสุด มาเก็บไว้ใน $todos
        $todos = Todo::where('user_id', Auth::id())->latest()->paginate(5);
        
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
    public function store(TodoStoreRequest $request): RedirectResponse
    {
        Todo::create($request->validated());

        return redirect()->route('todo.create')->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        Gate::authorize('view', $todo);
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoUpdateRequest $request, Todo $todo): RedirectResponse
    {
        $todo->update($request->validated());

        return redirect()->route('todo.index')->with('success', 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo): RedirectResponse
    {
        $todo->delete();

        return redirect()->route('todo.index')->with('success', 'Todo deleted successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function state(Todo $todo)
    {
        $todo->update(['is_completed' => !$todo->is_completed]);
        return redirect()->route('todo.index')->with('success', 'Todo state successfully.');
    }
}
