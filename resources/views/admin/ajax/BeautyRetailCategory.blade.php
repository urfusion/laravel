
<div class="form-group" >
    <label class="col-sm-3 control-label" for="field-1">Beauty Retail Category</label>

    <div class="col-sm-5" >
        {!! Form::select('BeautyRetailCategory[]', Config::get('constants.BeautyRetailCategory'), null, ['class' => 'form-control','id' => 'BeautyRetailCategory','multiple']) !!}
    </div>
</div>
<div class="form-group" >
    <label class="col-sm-3 control-label" for="field-1">Shop Type</label>
    <div class="col-sm-5" >
        {!! Form::select('ShopTypeo2[]', Config::get('constants.ShopTypeo2'), null, ['class' => 'form-control','id' => 'ShopTypeo2','multiple']) !!}
    </div>
</div>
