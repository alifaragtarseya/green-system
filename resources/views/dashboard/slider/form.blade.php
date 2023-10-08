@csrf
<div class="form-body form_add">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#General" data-toggle="tab"> {{ __('lang.general') }} </a>
                </li>
                <li class="">
                    <a href="#English" data-toggle="tab"> {{ __('lang.english') }} </a>
                </li>
                <li>
                    <a href="#Arabic" data-toggle="tab"> {{ __('lang.arabic') }} </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="General">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                            <label for="link">{{ __('lang.link') }}</label>
                            <input type="url" id="link" name="link" value="{{ old('link', $data->link ?? null) }}" class="form-control" placeholder="{{ __('lang.enter') }} {{ __('lang.link') }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label class="display-block" for="image">{{ __('lang.choose') }} {{ __('lang.image') }} <span class="required"> * {{ __('lang.best_size') }} ({{ __('lang.width') }}:1920 * {{ __('lang.height') }}:700)</span></label>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ asset($data->image ?? null) }}"/>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"> </div>
                                <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new"> {{ __('lang.choose') }} {{ __('lang.image') }}</span>
                                        <span class="fileinput-exists">{{ __('lang.change') }} {{ __('lang.image') }} </span>
                                        <input type="file" name="image" id="image">
                                    </span>
                                    <a type="button" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ __('lang.delete') }} {{ __('lang.image') }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade  lang_en " id="English">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('en.title') ? 'has-error' : '' }}">
                            <label for="title">Title <span class="required">*</span></label>
                            <input type="text" id="title" name="en[title]" value="{{ old('en.title', isset($data) ? optional($data->translate('en'))->title : null) }}" class="form-control" placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('en.description') ? 'has-error' : '' }}">
                            <label for="description"> Description <small><span class="remChars">{{ 600 - mb_strlen(old('en.description', isset($data) ? optional($data->translate('en'))->description : null)) }}</span> Characters Remaining</small></label>
                            <textarea id="description" maxlength="600" name="en[description]" class="form-control max_length" placeholder="Enter Small Description">{{ old('en.description', isset($data) ? optional($data->translate('en'))->description : null) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade lang_ar" id="Arabic">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('ar.title') ? 'has-error' : '' }}">
                            <label for="title"> العنوان<span class="required">*</span></label>
                            <input type="text" id="title" name="ar[title]" value="{{ old('ar.title', isset($data) ? optional($data->translate('ar'))->title : null) }}" class="form-control" placeholder="أدخل العنوان">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group {{ $errors->has('ar.description') ? 'has-error' : '' }}">
                                <label for="description_ar">وصف   <small><span class="remChars">{{ 600 - mb_strlen(old('ar.description', isset($data) ?optional( $data->translate('ar'))->description : null)) }}</span> الأحرف المتبقية</small></label>
                                <textarea id="description_ar" maxlength="600" name="ar[description]" class="form-control max_length" placeholder="أدخل وصف ">{{ old('ar.description', isset($data) ?optional( $data->translate('ar'))->description : null) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
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
                    <a href="{{ route('dashboard.slider') }}" class="btn default">{{ __('lang.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
