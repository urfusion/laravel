<select class="" name="districtf" id="districtf">
     <option value="">{{{ trans("site/site.District") }}}</option>
    @foreach($District as $district)
    <option value="{{$district->id}}" {{ (Input::get('district') == $district->id) ? 'selected="selected"' : null }} >@if(App::getLocale()=='jp'){{$district->name_c}}   @else {{$district->name_e}}    @endif</option>
    @endforeach
</select>

 
<script>
$(function () {
	$("#districtf").selectbox();
});
</script>