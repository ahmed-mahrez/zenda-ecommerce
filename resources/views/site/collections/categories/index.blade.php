<x-site-layout title="Collections">
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Our Categories</h4>
                    <div class="underline mb-5"></div>
                </div>
                @foreach($categories as $category)
                <div class="col-6 col-md-3">
                    <div class="category-card" style="height: 300px">
                        <a href="{{asset('collections/' . $category->slug)}}">
                            <div class="category-card-img" style="height:100%">
                                <img src="{{ asset("storage/$category->image") }}" class="w-100" style="height:80%">
                            </div>
                            <div class="category-card-body">
                                <h5>{{ $category->name }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-site-layout>