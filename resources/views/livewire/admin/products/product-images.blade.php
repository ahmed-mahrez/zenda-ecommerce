<div>
    @forelse($images as $image)
    <div style="display: inline-block;">
        <img src="{{asset('storage/' . $image->image)}}" class="border mr-5" style="width:80px;height:80px;border-radius:3px;margin-right:15px"><br>
        <a href="#" wire:click="deleteImage({{$image->id}})">remove</a>
    </div>
    @empty
    <p>- there is no images for this product.</p>
    @endforelse
</div>