@extends('layouts.master')
@push('head')
<title>เเก้ไขรายการ | Laravel</title>
@endpush

@section('main')
<div class="add">
    <h2 class="text-xl font-semibold mt-5 text-[#063c76]">เเก้ไขรายการ</h2>

    <form action="{{ route('todo.update',$todo) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="grid gap-6 mb-6">
            <div>
                <div class="relative">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-600">รายการ</label>
                    <input type="text" id="title" name="title" value="{{old('title',$todo->title)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="หัวข้อ" required />
                </div>
                @error('title')<p id="title_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">Oh, snapp! </span>{{ $message }}</p>@enderror
            </div>
            <div>
                <div class="relative">
                    <label for="time" class="block mb-2 text-sm font-medium text-gray-600">ระยะเวลา</label>
                    <input type="time" id="time" name="time" value="{{old('time')}}" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{old('time')}}" />
                </div>
                @error('time')<p id="time_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">Oh, snapp! </span>{{ $message }}</p>@enderror
            </div>
            <div>
                <div class="relative">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-600">รายละเอียด</label>
                    <textarea id="description" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="รายละเอียด">{{old('description',$todo->description)}}</textarea>
                </div>
                @error('description')<p id="description_error_help" class="mt-2 text-xs text-red-600"><span class="font-medium">Oh, snapp! </span>{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">บันทึก</button>

            <a href="{{ route('todo.index') }}" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">กลับหน้าหลัก</a>
        </div>
    </form>
</div>
@endsection