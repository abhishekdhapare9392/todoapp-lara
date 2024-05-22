<?php

use App\Models\Todo;
use function Livewire\Volt\{state, with};


state(['task']);

with([
    'todos' => fn() => auth()->user()->todos
]);


$add = function(){
    $todo = auth()->user()->todos()->create([
        'task' => $this->task
    ]);

    Mail::to(auth()->user())->queue(new TodoCreated($todo));

    $this->task = '';
};

$delete = fn(Todo $todo) => $todo->delete();

?>

<div>
    <form wire:submit='add'>
        <input type="text" wire:model.live='task' style="color: #000">
        <button type="submit" class="btn btn-primary">Add</button>
    </form>

    <div class="mt-2">
        <ul>
            @foreach ($todos as $todo)
            <li>
                {{ $todo->task }}
                <button wire:click='delete({{ $todo->id }})'>X</button>
            </li>
            @endforeach
        </ul>
    </div>
</div>