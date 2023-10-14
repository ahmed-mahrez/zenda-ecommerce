<div>
    <table class="table table-bordered table striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr wire:key="{{$category->id}}">
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{ $category->status == 1 ? 'Visible' : 'hidden'}}</td>
                <td>
                    <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-success">Edit</a>
                    <a href="#" wire:click="setCategoryID({{$category->id}})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4">no categories yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure of deleting this category?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="deleteCategory" type="button" class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

</div>