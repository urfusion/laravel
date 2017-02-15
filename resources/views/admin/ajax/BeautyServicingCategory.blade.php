
<div class="form-group" >
    <label class="col-sm-3 control-label" for="field-1">Beauty Servicing Category</label>

    <div class="col-sm-5" >
{!! Form::select('BeautyServicingCategory[]', Config::get('constants.BeautyServicingCategory'), null, ['class' => 'form-control','id' => 'BeautyServicingCategory','multiple']) !!}    </div>
</div>

<div class="form-group" >
    <label class="col-sm-3 control-label" for="field-1">Shop Type</label>

    <div class="col-sm-5" >
        {!! Form::select('ShopTypeo3[]', Config::get('constants.ShopTypeo3'), null, ['class' => 'form-control','id' => 'ShopTypeo3','multiple']) !!}
    </div>
</div>