<select class="form-control" name="district" id="district">
    <option value="">{{{ trans("site/site.District") }}}</option>
    @foreach($region as $Region)
    <option value="{{$Region}}" {{ (Input::get('$Region') == $Region) ? 'selected="selected"' : null }} >{{$Region}}</option>
    @endforeach
</select>
 