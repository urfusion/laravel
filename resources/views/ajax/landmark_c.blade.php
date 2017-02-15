  
<select class="" name="landmark" id="landmark"> 
    <option value="">{{{ trans("site/site.Mall") }}}/{{{ trans("site/site.Landmark") }}}</option>
    @foreach($landmark as $Landmark)
    <option value="{{$Landmark->mall_c}}@if($Landmark->landmark_c!=null)/{{$Landmark->landmark_c}}@endif" {{ (Input::get('landmark') == $Landmark->mall_c) ? 'selected="selected"' : null }} >{{$Landmark->mall_c}}
        
        @if($Landmark->landmark_c!=null)/{{$Landmark->landmark_c}}@endif

    </option>
    @endforeach
</select>




<script>
    $(function () {
        $("#landmark").selectbox();
    });
</script>