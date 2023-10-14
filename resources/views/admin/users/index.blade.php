<x-admin-layout title="Users">
    <x-admin.alert />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>users
                        <a href="{{route('admin.users.create')}}" class="btn btn-primary float-end">Add user</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-success">Edit</a>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete</a>    
                                    @include('admin.users.delete-modal')       
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">- no users yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <Br><Br>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>