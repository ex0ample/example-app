@extends('layouts.master')

@push('head')
<title>Add Todo </title>
@endpush

@section('main')
<div class="todo">
    <h2 class="text-xl font-semibold mt-5 text-[#063c76]">To-do List</h2>

    @session('success')
    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ $value }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endsession

    <ul class="my-4 ">
        @forelse ($todos as $todo)
        <li class=" mt-4" id="{{ $loop->iteration }}">
            <div class="flex justify-start items-center h-12 shadow drop-shadow-md rounded-[7px] px-3 hover:shadow-md">
                <div class="grow flex justify-start items-center">
                    <span id="check{{ $loop->iteration }}" class=" w-7 h-7 bg-white rounded-full border border-white transition-all cursor-pointer hover:border-[#36d344] flex justify-center items-center" onclick="checked({{ $loop->iteration }})"><i class="text-gray-300 fa fa-check"></i></span>
                    <strike id="strike{{ $loop->iteration }}" class="strike_none text-sm ml-4 text-[#5b7a9d] font-semibold">{{ $todo->title}}</strike>
                    <span class="ml-3 mt-0 text-sm text-[#5b7a9d]">{{ $todo->created_at->format('d, M Y') }}</span>
                </div>
                <div class="flex-none">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown-{{ $loop->iteration }}" data-dropdown-placement="left-end" data-dropdown-offset-distance="10" data-dropdown-offset-skidding="0" class="inline-block text-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-100 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-{{ $loop->iteration }}" class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="{{ route('todo.show',$todo) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">รายละเอียด</a>
                            </li>
                            <li>
                                <a href="{{ route('todo.edit',$todo) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">เเก้ไข</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('todo.destroy',$todo) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('todo.destroy',$todo) }}" onclick="event.preventDefault();  this.closest('form').submit();" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">ลบ</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        @empty
        <li class="text-sm text-gray-600"> - ไม่พบข้อมูล.</li>
        @endforelse
    </ul>
    <a href="{{ route('todo.create') }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">เพิ่มรายการ</a>
</div>
@endsection

@push('footer')
<script>
function checked(id) {
    var checked_green = document.getElementById("check" + id);
    var strike_unstrike = document.getElementById("strike" + id);

    strike_unstrike.classList.toggle('strike_none');
    checked_green.classList.toggle('green');
}
</script>
@endpush