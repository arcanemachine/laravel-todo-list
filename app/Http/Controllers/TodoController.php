<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
    /** Display a listing of the resource. */
    public function index(Request $request): View
    {
        return view('todos.index', [
            'todos' => $request->user()->todos()->get(),
        ]);
    }

    /** Show the form for creating a new resource. */
    public function create()
    {
        //
    }

    /** Store a newly created resource in storage. */
    public function store(Request $request): RedirectResponse
    {
        error_log("Creating new todo...");

        // validate form data
        $validated = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // create new object
        $request->user()->todos()->create($validated);

        // queue success message
        session()->flash('status', 'Item created successfully');

        // redirect to object index
        return redirect(route('todos.index'));
    }

    /** Display the specified resource. */
    public function show(): View
    {
        abort(403);
    }

    /** Show the form for editing the specified resource. */
    public function edit(Todo $todo)
    {
        // ensure the user is authorized to edit the object
        $this->authorize('edit', $todo);

        return view('todos.edit', ['todo' => $todo]);
    }

    /** Update the specified resource in storage. */
    public function update(Request $request, Todo $todo)
    {
        // ensure the user is authorized to update the object
        $this->authorize('update', $todo);

        // validate form data
        $validated = $request->validate(['content' => 'required|string|max:255']);

        // update the object
        $todo->update($validated);

        // queue success message
        session()->flash('status', 'Item updated successfully');

        // redirect to object index
        return redirect(route('todos.index'));
    }

    /** Remove the specified resource from storage. */
    public function destroy(Todo $todo)
    {
        // ensure user is authorized to delete the object
        $this->authorize('delete', $todo);

        // delete the object
        $todo->delete();

        // queue success message
        session()->flash('status', 'Item deleted successfully');

        // redirect to object index
        return redirect(route('todos.index'));
    }
}
