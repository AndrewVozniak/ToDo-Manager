@props(['subtasks', 'task'])

<div class="px-5 py-2 mb-5 border border-slate-800 font-bold rounded flex flex-col justify-between" x-data="{'isModalOpen': false, 'isSubTasksOpen': false, 'isSubtaskModalOpen': false}">
    <div class="flex flex-row justify-between">
        <div class="flex flex-col">
            {{-- Data --}}
            <div class="name mb-2">Task Name: {!! $name !!}</div>
            <div class="term mb-2">Task Term: {!! $term !!}</div>
            <div class="status mb-2">Task Status: {!! $status !!}</div>
        </div>

        {{-- Buttons --}}
        <div class="flex flex-col justify-center">
            <div class="flex flex-row mb-2">
                <button @click="isSubtaskModalOpen=true" class="rounded px-2 py-2.5 text-left mr-5 text-sm hover:bg-gray-50 disabled:text-gray-500">
                    Add Subtask
                </button>
                
                
                <button @click="isModalOpen=true" class="rounded px-2 py-2.5 text-left mr-5 text-sm hover:bg-gray-50 disabled:text-gray-500">
                    Edit Task
                </button>
                
                <form action="{{ route('deleteTask', ['id' => $id]) }}" method="post">
                    @csrf
                    <button type="submit" class="rounded px-2 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                        <span class="text-red-600">Delete Task</span>
                    </button>
                </form>
            </div>

            <button class="px-5 py-2 bg-slate-800 hover:bg-slate-700 rounded text-white" @click="isSubTasksOpen=true">SubTasks</button>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal-center" @click.away="isModalOpen=false" x-show="isModalOpen">
        <x-task-modal>
            <x-slot:title>Edit Task: {!! $name !!}</x-slot:title>
            <x-slot:type>edit</x-slot:type>
            <x-slot:id>{!! $id !!}</x-slot:id>

            <x-slot:task_name>{!! $name !!}</x-slot:task_name>
            <x-slot:task_term>{!! $term !!}</x-slot:task_term>
            <x-slot:task_status>{!! $status !!}</x-slot:task_status>

            <x-slot:buttonText>Edit</x-slot:buttonText>
        </x-task-modal>
    </div>

    <x-subtask :subtasks="$subtasks"></x-subtask>

    <div class="modal-center" @click.away="isModalOpen=false" x-show="isSubtaskModalOpen">
        <x-subtask-modal>
            <x-slot:title>Create New Subtask</x-slot:title>
            <x-slot:type>create</x-slot:title>
            <x-slot:buttonText>Create</x-slot:buttonText>
            <x-slot:task_id>{!! $task->id !!}</x-slot:task_id>
        </x-subtask-modal>
    </div>
</div>