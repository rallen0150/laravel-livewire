<div>
    <table class="table-auto w-full">
        <!-- <tr>
            <td><input type="text" placeholder="Filter Task" name="filterTask" wire:keydown="searchTask('description', this.value)"></td>
            <td>
                <select name="filterStatus" id="filterStatus" wire:change="filterStatus(this.value)">
                    <option value="all">All</option>
                    <option value="pending">Pending</option>
                    <option value="finished">Finished</option>
                </select>
            </td>
        </tr> -->
        <tr>
            <th class="px-4 py-2">Task</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2" colspan="2">Actions</th>
        </tr>
        <tbody>
        @foreach ($list as $todo)
            <tr @if($loop->even)class="bg-grey"@endif>
                <td class="border px-4 py-2">
                    {{ $todo->description }}
                </td>
                <td class="border px-4 py-2">@if($todo->status == 'finished')Finished @else Pending @endif</td>
                <td class="border px-4 py-2">
                    @if($todo->status == 'finished')
                        <!-- <button wire:click="markAsToDo({{ $todo->id }})" class="bg-red-100 text-red-600 px-6 rounded-full">
                            Mark as "To Do"
                        </button> -->
                        <input type="checkbox" name="status" value="" wire:click="markAsToDo({{ $todo->id }})" checked>
                        <label for="status">Finished?</label>
                    @else
                        <!-- <button wire:click="markAsDone({{ $todo->id }})" class="bg-gray-800 text-white px-6 rounded-full">
                            Mark as "Done"
                        </button> -->
                        <input type="checkbox" name="status" value="" wire:click="markAsDone({{ $todo->id }})">
                        <label for="status">Finished?</label>
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <button wire:click="deleteItem({{ $todo->id }})" class="bg-red-100 text-red-500 px-6 rounded-full">
                        <!-- Delete Permanently -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $list->links() }}
</div>