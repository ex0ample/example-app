@extends('layouts.master')
@push('head')
<title>Laravel | Add Todo </title>
@endpush

@section('main')
<div class="create">
    <h2 class="text-xl font-semibold mt-5 text-[#063c76]">เพิ่มรายการ</h2>

    @session('success')
    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            เพิ่มข้อมูลสำเร็จ <a href="#" class="font-semibold underline hover:no-underline">ดูข้อมูลเพิ่มเติม</a>.
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endsession

    <form action="{{ route('todo.store') }}" method="POST">
        @csrf
        <div class="grid gap-6 mb-6">
            <div>
                <div class="relative">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-600">รายการ</label>
                    <input type="text" id="title" name="title" value="{{old('title')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="หัวข้อ" required/>
                </div>
                @error('title')<p id="title_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">Oh, snapp! </span>{{ $message }}</p>@enderror
            </div>
            <div>
                <div class="relative">
                    <label for="time" class="block mb-2 text-sm font-medium text-gray-600">ระยะเวลา</label>
                    <input type="time" id="time" name="time" value="{{old('time')}}" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{old('time')}}" required />
                </div>
                @error('time')<p id="time_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">Oh, snapp! </span>{{ $message }}</p>@enderror
            </div>
            <div>
                <div class="relative">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-600">รายละเอียด</label>
                    <textarea id="description" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="รายละเอียด">{{old('description')}}</textarea>
                </div>
                @error('description')<p id="description_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">Oh, snapp! </span>{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">บันทึก</button>
        </div>
    </form>
</div>
@endsection