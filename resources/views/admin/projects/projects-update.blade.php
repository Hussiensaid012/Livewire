<x-edit-model title="Add New Project">
    <div class="row">
        <div class="col-md-6 mb-0">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Name" wire:model="name" />
            @include('admin.error', ['property' => 'name'])
        </div>

        <div class="col-md-6 mb-0 ">
            <label class="form-label">link</label>
            <input type="url" class="form-control" placeholder="link" wire:model="link" />
            @include('admin.error', ['property' => 'link'])
        </div>

        <div class="col-md-6 mb-0 mt-2">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" placeholder="Image" wire:model="image" />
            <div wire:loading wire:target="image">Uploading...</div>
            @include('admin.error', ['property' => 'image'])
        </div>

        <div class="col-md-6 mb-0 mt-2">
            <label class="form-label">Category</label>
            <select class="form-control" wire:model="category_id">
                <option value="">Select Category</option>
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" wire:key="category-{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                @endif
            </select>
            @include('admin.error', ['property' => 'Category_id'])
        </div>

        @if ($image)
            <img src="{{ $image->temporaryUrl() }}" width="100%" height="150px">
        @endif

        <div class="col-md-12 mb-0 mt-2">
            <label class="form-label">Description</label>
            <textarea type="number" class="form-control" placeholder="description" wire:model="description"></textarea>
            @include('admin.error', ['property' => 'description'])
        </div>
    </div>
</x-edit-model>
