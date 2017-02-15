 
<div class="form-group" >
    <label class="col-sm-3 control-label" for="field-1">Fashion Category</label>

    <div class="col-sm-5" >
        {!! Form::select('FashionCategory[]', Config::get('constants.FashionCategory'), null, ['class' => 'form-control','id' => 'FashionCategory','multiple']) !!}
    </div>
</div>

<div class="form-group" >
    <label class="col-sm-3 control-label" for="field-1">Shop Type</label>

    <div class="col-sm-5" >
        {!! Form::select('ShopTypeo1[]', Config::get('constants.ShopTypeo1'), null, ['class' => 'form-control','id' => 'ShopTypeo1','multiple']) !!}
    </div>
</div>

