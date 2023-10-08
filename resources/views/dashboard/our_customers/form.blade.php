<div class="form-body form_add">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#General" data-toggle="tab"> {{ __('lang.general') }} </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="General">

                    @foreach(config('translatable.locales') as $locale)
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title_{{ $locale }}">  {{ __('lang.title_'.$locale) }} <span class="required">*</span></label>
                            <input type="text" id="title_{{ $locale }}" name="{{ $locale }}[title]" value="{{ isset($data) ? optional($data->translate($locale))->title: old('title') }}" class="form-control" placeholder="{{ __('lang.title_'.$locale) }}">
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label class="display-block" for="image">{{ __('lang.choose') }} {{ __('lang.image') }} <span class="required"> {{ __('lang.best_size') }} (({{ __('lang.width') }}: 820) * ({{ __('lang.height') }}: 410))</span></label>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ isset($data) ? asset($data->image) : asset('images/default.png') }}"/>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.image') }}</span>
                                        <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.image') }} </span>
                                        <input type="file" name="image" id="image">
                                    </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class=" col-md-9">
                    <button type="submit" id="submit" class="btn green">{{ __('lang.submit') }}</button>
                    <a href="{{ route('dashboard.our_customers') }}" class="btn default">{{ __('lang.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

@section('css')
    <link href="{{ asset('assets/flaticons/flaticon.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('js')
@stop
