@props(['subtasks', 'task'])

<div class="flex flex-row border-t-2 border-slate-500 mt-5 py-5" x-show="isSubTasksOpen">     
    <div class="flex flex-col w-full">

        @foreach($subtasks as $subtask)
            <div class="flex flex-row justify-between border-b border-slate-500 py-3" x-data="{'isModalOpen': false}">
                {{-- Data --}}
                <div class="flex flex-col">
                    <div>ID: {{ $subtask->id }}</div>
                    <div>Name: {!! $subtask->name !!}</div>
                    <div>Description: {!! $subtask->description !!}</div>
                    <div>Term: {!! $subtask->term !!}</div>
                    <div>Status: {!! $subtask->status !!}</div>
                </div>

                {{-- Buttons --}}
                <div class="flex flex-col justify-center">
                    <button @click="isModalOpen=true" class="rounded px-2 py-2.5 text-left mr-5 text-sm hover:bg-gray-50 disabled:text-gray-500">
                        Edit Task
                    </button>

                    <form action="{{ route('deleteSubtask', ['id' => $subtask->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="rounded px-2 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                            <span class="text-red-600">Delete Subtask</span>
                        </button>
                    </form>
                </div>
                
                {{-- Edit Modal --}}
                <div class="modal-center" @click.away="isModalOpen=false" x-show="isModalOpen">
                    <x-subtask-modal>
                        <x-slot:title>Edit Subtask: {!! $subtask->name !!}</x-slot:title>
                        <x-slot:type>edit</x-slot:type>
                        <x-slot:id>{{ $subtask->id }}</x-slot:id>

                        <x-slot:subtask_name>{{ $subtask->name }}</x-slot:subtask_name>
                        <x-slot:subtask_term>{!! $subtask->term !!}</x-slot:subtask_term>
                        <x-slot:subtask_description>{!! $subtask->description !!}</x-slot:subtask_description>
                        <x-slot:subtask_status>{!! $subtask->status !!}</x-slot:subtask_status>

                        <x-slot:buttonText>Edit</x-slot:buttonText>
                    </x-subtask-modal>
                </div>
            </div>
        @endforeach
    </div>   

    <button @click="isSubTasksOpen=false" type="button" class="ml-5 max-h-10 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center" data-modal-hide="defaultModal">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close modal</span>
    </button>
</div>