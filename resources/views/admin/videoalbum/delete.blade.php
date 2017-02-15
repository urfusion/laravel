@extends('admin.layouts.modal') @section('content')
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">{{
			trans("admin/modal.general") }}</a></li>
</ul>
<form id="deleteForm" class="form-horizontal" method="post"
	action="@if (isset($videoalbum)){{ URL::to('admin/videoalbum/' . $videoalbum->id . '/delete') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> <input
		type="hidden" name="id" value="{{ $videoalbum->id }}" />
	<div class="form-group">
		<div class="controls">
			{{ trans("site/site.delete_message") }}<br>
			<element class="btn btn-warning btn-sm close_popup">
			<span class="glyphicon glyphicon-ban-circle"></span> {{
			trans("site/site.cancel") }}</element>
			<button type="submit" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"></span> {{
				trans("site/site.delete") }}
			</button>
		</div>
	</div>
</form>
@stop