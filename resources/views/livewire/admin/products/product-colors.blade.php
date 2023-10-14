<div>
    <div>
        <div class="col-md-4 mb-4">
            <label>Select colors:</label>
            <div class="row mt-3">
                @forelse($other_colors as $other_color)
                <div class="col-md-3">
                    <div class="p2 border mb-3" style="width:120px">
                        <input type="checkbox" name="colors[{{$other_color->id}}]">
                        {{ $other_color->name }}<Br><br>
                        <label>quantity:</label><Br>
                        <input type="number" min="1" name="quantities[{{$other_color->id}}]" style="width:70px;">
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <p>- No colors found</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Product colors -->
    <div class="table-responsive">
        <h5 class="mt-5">Product Colors</h5>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Quantity</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                @forelse($productColors as $color)
                <tr id="deleteColorBtn-{{$color->id}}">
                    <td>{{ $color->color->name }}</td>
                    <td>
                        <div class="input-group mb-3" style="width: 150px;">
                            <input type="integer" min="1" value="{{$color->quantity}}" id="updateQtyBtn-{{$color->id}}" class=" form-control form-control-sm">
                            <button type="button" value="{{$color->id}}" class="updateQtyBtn btn btn-primary btn-sm text-white">Update</button>
                        </div>
                    </td>
                    <td>
                        <button type="button" wire:click="removeColor({{$color->id}})" class="deleteColorBtn btn btn-danger btn-sm text-white">Delete</button>
                    </td>
                </tr>
                @empty
                <td colspan="3">- no colors for this product</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>