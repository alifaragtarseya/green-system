<div class="form-body form_add">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#General" data-toggle="tab"> {{ __('lang.general') }} </a>
                </li>
                <li>
                    <a href="#Information" data-toggle="tab"> {{ __('lang.details') }} </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="General">
                    <div class="col-md-8">
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label class="display-block" for="image">{{ __('lang.choose') }} {{ __('lang.image') }} <span class="required"> {{ __('lang.best_size') }} (({{ __('lang.width') }}: 1000) * ({{ __('lang.height') }}: 800))</span></label>
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
                <div class="tab-pane fade" id="Information">
                    @foreach(config('translatable.locales') as $locale)
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title_{{ $locale }}">  {{ __('lang.title_'.$locale) }} <span class="required">*</span></label>
                            <input type="text" id="title_{{ $locale }}" name="{{ $locale }}[title]" value="{{ isset($data) ? optional($data->translate($locale))->title: old('title') }}" class="form-control" placeholder="{{ __('lang.title_'.$locale) }}">
                        </div>
                    </div>
                    @endforeach
                    @foreach(config('translatable.locales') as $locale)
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description_{{ $locale }}"> {{ __('lang.description_'.$locale) }} <span class="required">*</span></label>
                            <textarea id="description_{{ $locale }}" name="{{ $locale }}[description]" class="form-control tinymce_ar" placeholder="{{ __('lang.description_'.$locale) }}">{{ isset($data) ? optional($data->translate($locale))->description: old('description') }}</textarea>
                        </div>
                    </div>
                    @endforeach
                    @foreach(config('translatable.locales') as $locale)
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
                            <label for="meta_keywords_{{ $locale }}">{{ __('lang.meta_keywords_'.$locale) }}</label>
                            <textarea id="meta_keywords_{{ $locale }}" name="{{ $locale }}[meta_keywords]" class="form-control" placeholder="{{ __('lang.meta_keywords_'.$locale) }}">{{ isset($data) ? optional($data->translate($locale))->meta_keywords: old('meta_keywords') }}</textarea>
                        </div>
                    </div>
                    @endforeach
                    @foreach(config('translatable.locales') as $locale)
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                            <label for="meta_description_{{ $locale }}"> {{ __('lang.meta_description_'.$locale) }} </label>
                            <textarea id="meta_description_{{ $locale }}" name="{{ $locale }}[meta_description]" class="form-control" placeholder="{{ __('lang.meta_description_'.$locale) }}">{{ isset($data) ? optional($data->translate($locale))->meta_description: old('meta_description') }}</textarea>
                        </div>
                    </div>
                    @endforeach
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
                    <a href="{{ route('dashboard.projects') }}" class="btn default">{{ __('lang.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
