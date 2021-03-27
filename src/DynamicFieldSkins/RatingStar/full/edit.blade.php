<div class="xe-form-group xe-dynamicField">
    <label class="xu-form-group__label __xe_df __xe_df_number __xe_df_number_{{$config->get('id')}}">{{xe_trans($config->get('label'))}}</label>
    @if ($config->get('skinDescription') !== '')<small>{{$config->get('skinDescription')}}</small>@endif

    <fieldset class="dynamic_field_rate">
        <input type="radio" id="__xe_df_number_{{$config->get('id')}}10" @if($data['num'] === 10) checked @endif name="{{$key['num']}}" value="10" /><label for="__xe_df_number_{{$config->get('id')}}10" title="5 stars"></label>
        <input type="radio" id="__xe_df_number_{{$config->get('id')}}9" @if($data['num'] === 9) checked @endif name="{{$key['num']}}" value="9" /><label class="half" for="__xe_df_number_{{$config->get('id')}}9" title="4 1/2 stars"></label>
        <input type="radio" id="__xe_df_number_{{$config->get('id')}}8" @if($data['num'] === 8) checked @endif name="{{$key['num']}}" value="8" /><label for="__xe_df_number_{{$config->get('id')}}8" title="4 stars"></label>
        <input type="radio" id="__xe_df_number_{{$config->get('id')}}7" @if($data['num'] === 7) checked @endif name="{{$key['num']}}" value="7" /><label class="half" for="__xe_df_number_{{$config->get('id')}}7" title="3 1/2 stars"></label>
        <input type="radio" id="__xe_df_number_{{$config->get('id')}}6" @if($data['num'] === 6) checked @endif name="{{$key['num']}}" value="6" /><label for="__xe_df_number_{{$config->get('id')}}6" title="3 stars"></label>
        <input type="radio" id="__xe_df_number_{{$config->get('id')}}5" @if($data['num'] === 5) checked @endif name="{{$key['num']}}" value="5" /><label class="half" for="__xe_df_number_{{$config->get('id')}}5" title="2 1/2 stars"></label>
        <input type="radio" id="__xe_df_number_{{$config->get('id')}}4" @if($data['num'] === 4) checked @endif name="{{$key['num']}}" value="4" /><label for="__xe_df_number_{{$config->get('id')}}4" title="2 stars"></label>
        <input type="radio" id="__xe_df_number_{{$config->get('id')}}3" @if($data['num'] === 3) checked @endif name="{{$key['num']}}" value="3" /><label class="half" for="__xe_df_number_{{$config->get('id')}}3" title="1 1/2 stars"></label>
        <input type="radio" id="__xe_df_number_{{$config->get('id')}}2" @if($data['num'] === 2) checked @endif name="{{$key['num']}}" value="2" /><label for="__xe_df_number_{{$config->get('id')}}2" title="1 star"></label>
        <input type="radio" id="__xe_df_number_{{$config->get('id')}}1" @if($data['num'] === 1) checked @endif name="{{$key['num']}}" value="1" /><label class="half" for="__xe_df_number_{{$config->get('id')}}1" title="1/2 star"></label>
    </fieldset>
</div>
