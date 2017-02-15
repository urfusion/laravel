<select class="" name="district" id="district">
    <option value="">{{{ trans("site/site.District") }}}</option>
    @foreach($District as $district)
    <option value="{{$district->id}}" {{ (Input::get('district') == $district->id) ? 'selected="selected"' : null }} >@if(App::getLocale()=='jp'){{$district->name_c}}   @else {{$district->name_e}}    @endif</option>
    @endforeach
</select>


<script>
    $(function () {
        $("#district").selectbox();



        $('#district').change(function ()
        {

            $.get('{{{ URL::to('') }}}/users/district/' + this.value, function (data)
            {
                $('#landmarkview').html(data);
            }
            );
        });

    });
</script>