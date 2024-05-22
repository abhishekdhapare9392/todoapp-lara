<?php

use App\Models\Todo;
use App\Mail\TodoCreated;
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
        <button type="submit" class="bg-gray-500"
            style="padding-left: 5px; padding-right: 5px; padding-top:3px; padding-bottom: 3px">Add</button>
    </form>

    <div class="mt-2">
        <ul>
            @foreach ($todos as $todo)
            <li>
                {{ $todo->task }}
                <button wire:click='delete({{ $todo->id }})' class="bg-gray-500"
                    style="padding-left: 5px; padding-right: 5px; padding-top:3px; padding-bottom: 3px; background-color: red;">X</button>
            </li>
            @endforeach
        </ul>
    </div>
</div>