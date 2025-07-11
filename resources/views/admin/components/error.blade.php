@if(Session::has('errors'))
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
        <div class="alert alert-danger bg-danger text-light d-flex align-items-center" role="alert">
            <p class="p-0 m-0 ft-medium full-width">{{ Session::get('errors') }}</p>
            <button type="button" class="btn-close text-light" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    </div>
</div>
@endif