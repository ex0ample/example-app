@extends('layouts.master')
@push('head')
<title>รายละเอียดข้อมูล | Laravel</title>
@endpush

@section('main')
<div class="add">
    <h2 class="text-xl font-semibold mt-5 text-[#063c76]">รายละเอียดรายการ</h2>
    <div class="flex flex-col mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-600">หัวข้อ</h2>
            <p class="text-gray-500 mb-2 md:mb-4">{{ $todo->title}}</p>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-gray-600">เวลา</h2>
            <p class="text-gray-500 mb-2 md:mb-4">10.00 AM</p>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-gray-600">รายละเอียด</h2>
            <p class="text-gray-500 mb-2 md:mb-4">{{ $todo->description}}</p>
        </div>

        <a href="{{ route('todo.index') }}" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">กลับหน้าหลัก</a>
    </div>
</div>
@endsection