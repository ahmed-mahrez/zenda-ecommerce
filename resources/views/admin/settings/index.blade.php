<x-admin-layout title="Settings">
    <x-admin.alert />

    <div class="row">
        <div class="col-md-12 grid-margin">
            <form action="{{route('admin.settings.store')}}" method="POST">
                @csrf
                <!-- Website -->
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Website Name</label>
                                <input type="text" name="website_name" value="{{$settings->website_name ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Website URL</label>
                                <input type="text" name="website_url" value="{{$settings->website_url ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Page Title</label>
                                <input type="text" name="website_title" value="{{$settings->website_title ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta keywords</label>
                                <input type="text" name="meta_keywords" value="{{$settings->meta_keywords ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta Description</label>
                                <input type="text" name="meta_description" value="{{$settings->meta_description ?? ''}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Webiste Info -->
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="3">{{$settings->address ?? ''}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone 1</label>
                                <input type="text" name="phone_1" value="{{$settings->phone_1 ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone 2</label>
                                <input type="text" name="phone_2" value="{{$settings->phone_2 ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email 1</label>
                                <input type="text" name="email_1" value="{{$settings->email_1 ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email 2</label>
                                <input type="text" name="email_2" value="{{$settings->email_2 ?? ''}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="card mb-3">
                    <div class="card-header bg-primary">
                        <h3 class="text-white mb-0">Website Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Facebook</label>
                                <input type="text" name="facebook" value="{{$settings->facebook ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Twitter</label>
                                <input type="text" name="twitter" value="{{$settings->twitter ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Instagram</label>
                                <input type="text" name="instagram" value="{{$settings->instagram ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Youtube</label>
                                <input type="text" name="youtube" value="{{$settings->youtube ?? ''}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary text-white">Save Settings</button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout>