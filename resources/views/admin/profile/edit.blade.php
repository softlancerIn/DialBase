<x-admin.layout type="profile">
    <div class="goodup-dashboard-content p-0">
        <div class="dashboard-tlbar d-block mb-3">
            <div class="row">
                <div class="colxl-9 col-lg-9 col-md-9">
                    <h1 class="ft-medium">Profile Info</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="theme-cl">My Profile</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="btn-group float-end mt-2">
                        <div class="form-group">
                            <button type="submit" form="profileForm" class="btn theme-bg rounded text-light">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 order-xl-last order-lg-last order-md-last">
                    <div class="d-flex bg-white rounded px-3 py-3">
                        <div class="dashboard-list-wraps bg-white rounded">
                            <div class="dashboard-list-wraps-head br-bottom pb-3">
                                <div class="dashboard-list-wraps-flx">
                                    <h4 class="mb-0 ft-medium fs-md"><i
                                            class="fa fa-user-friends me-2 theme-cl fs-sm"></i>My Social Links</h4>
                                </div>
                            </div>

                            <div class="dashboard-list-wraps-body py-3">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1"><i
                                                    class="ti-facebook theme-cl me-1"></i>Facebook</label>
                                            <input type="text" class="form-control rounded" name="facebook" form="profileForm"
                                                placeholder="https://facebook.com/" value="{{ old('facebook', $data['user']->facebook ?? '') }}" />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1"><i class="ti-twitter theme-cl me-1"></i>Twitter</label>
                                            <input type="text" class="form-control rounded" name="twitter" form="profileForm"
                                                placeholder="https://twitter.com/" value="{{ old('twitter', $data['user']->twitter ?? '') }}" />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1"><i
                                                    class="ti-instagram theme-cl me-1"></i>Instagram</label>
                                            <input type="text" class="form-control rounded" name="instagram" form="profileForm"
                                                placeholder="https://instagram.com/" value="{{ old('instagram', $data['user']->instagram ?? '') }}" />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1"><i
                                                    class="ti-linkedin theme-cl me-1"></i>Linkedin</label>
                                            <input type="text" class="form-control rounded" name="linkedin" form="profileForm"
                                                placeholder="https://linkedin.com/" value="{{ old('linkedin', $data['user']->linkedin ?? '') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                    <form id="profileForm" action="{{ route('update_profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $data['user']->id }}">
                        <div class="dashboard-list-wraps bg-white rounded mb-4">
                            <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                <div class="dashboard-list-wraps-flx">
                                    <h4 class="mb-0 ft-medium fs-md"><i
                                            class="fa fa-user-check me-2 theme-cl fs-sm"></i>My Profile</h4>
                                </div>
                            </div>

                            <div class="dashboard-list-wraps-body py-3 px-3">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">User ID</label>
                                            <input type="text" class="form-control rounded" value="{{ $data['user']->id }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">Name</label>
                                            <input type="text" class="form-control rounded" name="name" value="{{ $data['user']->name }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">Email ID</label>
                                            <input type="email" class="form-control rounded" name="email" value="{{ $data['user']->email }}" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">Mobile</label>
                                            <input type="text" class="form-control rounded"
                                                placeholder="91 256 584 7895" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">State</label>
                                            <select class="form-control">
                                                <option>Uttar Pradesh</option>
                                                <option>Uttrakhand</option>
                                                <option>Gujrat</option>
                                                <option>Mumbai</option>
                                                <option>Karnatak</option>
                                                <option>Goa</option>
                                                <option>Punjab</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">City</label>
                                            <select class="form-control">
                                                <option>Aligarh</option>
                                                <option>Allahabad</option>
                                                <option>Agra</option>
                                                <option>Gonda</option>
                                                <option>Lucknow</option>
                                                <option>Meeruth</option>
                                                <option>Gaziabad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">Address</label>
                                            <input type="text" class="form-control rounded"
                                                placeholder="USA 20TH Berlin Market NY" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">Zip Code</label>
                                            <input type="text" class="form-control rounded" placeholder="HQ125478" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">About Notes</label>
                                            <textarea class="form-control rounded ht-150"
                                                placeholder="Describe your self"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('change_password') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $data['user']->id }}">
                        <div class="dashboard-list-wraps bg-white rounded mb-4">
                            <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                <div class="dashboard-list-wraps-flx">
                                    <h4 class="mb-0 ft-medium fs-md"><i
                                            class="fa fa-lock me-2 theme-cl fs-sm"></i>Change Password</h4>
                                </div>
                            </div>

                            <div class="dashboard-list-wraps-body py-3 px-3">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">Old Password</label>
                                            <input type="password" class="form-control rounded" name="old_password" placeholder="Current Password" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">New Password</label>
                                            <input type="password" class="form-control rounded" name="new_password" placeholder="New Password" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">Confirm Password</label>
                                            <input type="password" class="form-control rounded" name="password_confirmation" placeholder="Confirm New Password" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn theme-bg rounded text-light">Update Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>

<script>
    document.getElementById('profileImageInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        
        if (file) {
            // Validate file is an image
            if (!file.type.startsWith('image/')) {
                alert('Please select an image file');
                this.value = '';
                return;
            }
            
            // Validate file size (max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('Image size should not exceed 5MB');
                this.value = '';
                return;
            }
            
            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profileImagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
