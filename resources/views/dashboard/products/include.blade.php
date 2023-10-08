<div class="profile-sidebar sidebar_profile menu_product">
    <div class="portlet light profile-sidebar-portlet ">
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="{{ Route::is('dashboard.products.view', $data->id) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.products.view',$data->id) }}"><i class="icon-info"></i> {{ trans('lang.general') }}</a>
                </li>
                <li class="{{ Route::is('dashboard.products.images',$data->id) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.products.images',$data->id) }}"><i class="icon-picture"></i> {{ trans('lang.images') }}</a>
                </li>
                <li class="{{ Route::is('dashboard.products.features',$data->id) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.products.features',$data->id) }}"><i class="icon-diamond"></i> {{ trans('lang.features') }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
