<x-admin.layout type="subCategory">
    <h4>Settings - States & Cities</h4>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card p-3">
                <h5>Create State</h5>
                <form method="post" action="{{ route('settings.save_state') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">State Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <button class="btn btn-primary">Create State</button>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3">
                <h5>Create City</h5>
                <form method="post" action="{{ route('settings.save_city') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">State</label>
                        <select name="state_id" class="form-control" required>
                            <option value="">-- Select State --</option>
                            @foreach ($states as $st)
                                <option value="{{ $st->id }}">{{ $st->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">City Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <button class="btn btn-primary">Create City</button>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Sitemap Management</h5>
                    <p class="text-muted">Generate sitemap.xml for SEO in root directory.</p>
                    <form method="post" action="{{ route('settings.generate_sitemap') }}">
                        @csrf
                        <button class="btn btn-success">Regenerate Sitemap</button>
                    </form>
                </div>
            </div>
        </div>
</x-admin.layout>
