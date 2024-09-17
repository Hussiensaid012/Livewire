<x-create-model title="Add New Category">
    <div class="row">
        <div class="col-md-12 mb-0">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" wire:model="name" />
            @include('admin.error', ['property' => 'name'])
        </div>

    </div>
</x-create-model>
