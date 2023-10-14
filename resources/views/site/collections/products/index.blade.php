<x-site-layout title="{{$category->name}} Category">
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">{{$category->name}} Products</h4>
                </div>
               @livewire('site.categories.products', ['category' => $category])
            </div>
        </div>
    </div>

</x-site-layout>