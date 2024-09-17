@extends('admin.master')
@section('counters-active', 'active')
@section('title', 'counters')
@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="mb-3">
            <h4 class="fw-bold py-3 mb-4 d-inline">counters</h4>
            <button type="button" class="btn btn-sm btn-primary mb-2 mx-2" data-bs-toggle="modal"
                data-bs-target="#createModal">
                Add New
            </button>
        </div>

        <div class="card mb-4">
            <div class="card-body ">
                @livewire('admin.counters.counter-data')
            </div>
        </div>
        @livewire('admin.counters.counter-delete')
        @livewire('admin.counters.counter-create')
        @livewire('admin.counters.counter-update')
    </div>
    <!-- / Content -->
@endsection
