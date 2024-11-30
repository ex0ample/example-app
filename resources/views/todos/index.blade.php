@extends('layouts.master')

@push('head')
<title>Add Todo </title>
@endpush

@section('main')
<div class="todo">
    <h2 class="text-xl font-semibold mt-5 text-[#063c76]">To-do List</h2>
    <ul class="my-4 ">
        <?php $i = 1; ?>
        @forelse ($todos as $todo)
        <li class=" mt-4" id="{{ $i }}">
            <div class="flex justify-start items-center h-12 shadow drop-shadow-md rounded-[7px] px-3 hover:shadow-md">
                <div class="grow flex justify-start items-center">
                    <span id="check{{ $i }}" class=" w-7 h-7 bg-white rounded-full border border-white transition-all cursor-pointer hover:border-[#36d344] flex justify-center items-center" onclick="checked({{ $i }})"><i class="text-gray-300 fa fa-check"></i></span>
                    <strike id="strike{{ $i }}" class="strike_none text-sm ml-4 text-[#5b7a9d] font-semibold">{{ $todo->title}}</strike>
                    <span class="ml-3 mt-0 text-sm text-[#5b7a9d]">12:00 PM</span>
                </div>
                <div class="flex-none">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown-{{ $i }}" data-dropdown-placement="left-end" data-dropdown-offset-distance="10" data-dropdown-offset-skidding="0" class="inline-block text-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-100 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown-{{ $i }}" class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">รายละเอียด</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">เเก้ไข</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">ลบ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        <?php $i++; ?>
        @empty
        <li>There are no data.</li>
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