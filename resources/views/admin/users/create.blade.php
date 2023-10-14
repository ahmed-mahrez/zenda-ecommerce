<x-admin-layout title="Add user">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>users
                        <a href="{{route('admin.users.index')}}" class="btn btn-primary float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.users.store')}}" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                <x-admin.input-error error="name" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                <x-admin.input-error error="email" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                                <x-admin.input-error error="password" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary ">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>