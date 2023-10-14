<x-site-layout title="My Profile">
    <div class="py-5 bg-white" style="margin: 50px 0 100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <x-admin.alert />
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">Profile Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('profile.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control">
                                            <x-admin.input-error error="name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="text" name="email" value="{{auth()->user()->email}}" class="form-control">
                                            <x-admin.input-error error="email" />
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 col-md-4">
                                        <label>Current Password</label>
                                        <input type="password" name="password" class="form-control">
                                        <x-admin.input-error error="password" />
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" class="form-control">
                                        <x-admin.input-error error="new_password" />
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                        <x-admin.input-error error="password_confirmation" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="{{auth()->user()->profile->phone ?? ''}}" class="form-control">
                                            <x-admin.input-error error="phone" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Zip Code</label>
                                            <input type="text" name="zip_code" value="{{auth()->user()->profile->zip_code ?? ''}}" class="form-control">
                                            <x-admin.input-error error="zip_code" />
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label>Address</label>
                                            <textarea name="address" rows="3" class="form-control">{{auth()->user()->profile->address ?? ''}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>