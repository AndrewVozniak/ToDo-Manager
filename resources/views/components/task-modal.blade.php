<div @click.away="isModalOpen = false" x-cloak x-show="isModalOpen" id="defaultModal" tabindex="-1" aria-hidden="true" class="modal-center">
    <div class="relative w-full h-full max-w-2xl md:h-auto">

        {{-- CREATE TASK MODAL ( AJAX ) --}}
        @if($type == "create")
        <!-- Modal content -->
        <form wire:submit.prevent="add" class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{ $title }}
                </h3>
                <button @click="isModalOpen=false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>


            <!-- Modal body -->
            <div class="p-6 w-96 space-y-6">
                <div class="flex flex-col">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="rounded" id="exampleInputName" placeholder="Enter name" wire:model="name" required>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            
                <div class="flex flex-col">
                    <label for="exampleInputEmail">Term</label>
                    <input type="date" data-type="DATE" class="rounded" id="exampleInputEmail" placeholder="Enter name" wire:model="term" required>
                    @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            
                <div class="flex flex-col">
                    <label for="exampleInputbody">Status</label>
                    <select wire:model="status" class="rounded" required>
                        <option value="Waiting...">Waiting...</option>
                        <option value="In work">In work</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                <button @click="isModalOpen=false" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">{{ $buttonText }}</button>
            </div>
        </form>


        {{-- EDIT TASK MODAL ( POST ) --}}
        @else
            <!-- Modal content -->
            <form action="{{ route('editTask', ['id' => $id]) }}" class="relative bg-white rounded-lg shadow" method="post">
                @csrf
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        {{ $title }}
                    </h3>
                    <button @click="isModalOpen=false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
    
    
                <!-- Modal body -->
                <div class="p-6 w-96 space-y-6">
                    <div class="flex flex-col">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="rounded" id="exampleInputName" placeholder="Enter name" name="name" value="{{ $task_name }}" required>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                
                    <div class="flex flex-col">
                        <label for="exampleInputEmail">Term</label>
                        <input type="date" data-type="DATE" class="rounded" id="exampleInputEmail" placeholder="Enter name" name="term" value="{{ $task_term }}" required>
                        @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                
                    <div class="flex flex-col">
                        <label for="exampleInputbody">Status</label>
                        <select name="status" class="rounded" required>
                            <option value="Waiting..." @if($task_status == "Waiting...") selected @endif>Waiting...</option>
                            <option value="In work" @if($task_status == "In work") selected @endif>In work</option>
                            <option value="Completed" @if($task_status == "Completed") selected @endif>Completed</option>
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                    <button @click="isModalOpen=false" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">{{ $buttonText }}</button>
                </div>
            </form>
        @endif
    </div>
</div>