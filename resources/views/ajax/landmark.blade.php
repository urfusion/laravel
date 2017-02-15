  
<select class="" name="landmark" id="landmark"> 
    <option value="">{{{ trans("site/site.Mall") }}}/{{{ trans("site/site.Landmark") }}}</option>
    @foreach($Landmark as $landmark)
    <option value="{{$landmark->id}}" {{ (Input::get('landmark_c') == $landmark->id) ? 'selected="selected"' : null }} >
        @if(App::getLocale()=='jp') 
        <?php $landmartag = $landmark->mall_c; ?>  @if($landmark->landmark_c!=null) <?php $landmartag = $landmartag . '/' . $landmark->landmark_c; ?>@endif  
        <?php echo trim($landmartag, "/"); ?>
        @else <?php $landmartag = $landmark->mall_e; ?> 
        @if($landmark->landmark_e!=null)<?php $landmartag = $landmartag . '/' . $landmark->landmark_e; ?>@endif 
        <?php echo trim($landmartag, "/"); ?>
        @endif  
    </option>
    @endforeach
</select>




<script>
    $(function () {
        $("#landmark").selectbox();
    });
</script>