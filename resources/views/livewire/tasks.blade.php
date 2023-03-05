<div>
    <div class="mb-5" x-data="{'isModalOpen': false}">
        <!-- Modal toggle -->
        <button x-on:click="isModalOpen = true" class="block text-white bg-blue-700 hover:bg-blue-600 font-medium rounded text-sm px-5 py-2.5 text-center" type="button">
            Add Task
        </button>
        
        <!-- Main modal -->
        <x-task-modal>
            <x-slot:title>Create New Task</x-slot:title>
            <x-slot:type>create</x-slot:title>
            <x-slot:buttonText>Create</x-slot:buttonText>
        </x-task-modal>
    </div>

    <div>
        @foreach($tasks as $task)
        <x-task :subtasks="$task->subtasks" :task="$task"> 
            <x-slot:name>{!! $task->name !!}</x-slot>
            <x-slot:status>{!! $task->status !!}</x-slot>
            <x-slot:term>{!! $task->term !!}</x-slot>
            <x-slot:id>{!! $task->id !!}</x-slot>
        </x-task>

        @endforeach
    </div>
</div>