<x-site-layout :title="$product->name">
    @livewire('site.categories.product-view', ['product' => $product])
</x-site-layout>