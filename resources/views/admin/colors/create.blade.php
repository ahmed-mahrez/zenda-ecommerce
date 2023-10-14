<x-admin-layout title="Add color">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add color
                        <a href="{{route('admin.colors.index')}}" class="btn btn-primary float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.colors.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                <x-admin.input-error error="name" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control" value="{{old('code')}}">
                                <x-admin.input-error error="code" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <label>Status</label>
                                <input type="checkbox" name="status" @checked(old('status'))>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>