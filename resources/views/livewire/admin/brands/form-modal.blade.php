<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">add brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit="storeBrand">
                    <div class="mb-4">
                        <label>Brand name</label>
                        <input type="text" class="form-control" wire:model="name">
                        <x-admin.input-error error="name" />
                    </div>
                    <div class="mb-4">
                        <label>Status</label>
                        <input type="checkbox" wire:model="status">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Modal -->

<!-- Update Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">update brand</h5>
                <button type="button" class="btn-close" wire:click="resetModels" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit="updateBrand">
                    <div class="mb-4">
                        <label>Brand name</label>
                        <input type="text" class="form-control" wire:model="name">
                        <x-admin.input-error error="name" />
                    </div>
                    <div class="mb-4">
                        <label>Status</label>
                        <input type="checkbox" wire:model="status"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="resetModels" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Update Modal -->

<!-- Delete Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete brand</h5>
                <button type="button" class="btn-close" wire:click="resetModels" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure of deleting this brand?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="resetModels" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" wire:click="destroyBrand">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete Modal -->