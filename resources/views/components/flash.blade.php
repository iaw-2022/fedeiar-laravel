@if(session()->has('success'))
    <div class="mx-4 position-fixed rounded-4 bottom-0 end-0 alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{ session()->get('success') }} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif