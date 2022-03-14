@if ($message = Session::get('success'))
<div class="alert alert-success ">
	<button type="button" class="btn-close" data-dismiss="alert"  aria-label="Close"></button>
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger ">
	<button type="button" class="btn-close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
</div>
@endif