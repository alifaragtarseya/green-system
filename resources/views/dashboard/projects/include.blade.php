<div class="profile-sidebar sidebar_profile menu_product">
    <div class="portlet light profile-sidebar-portlet ">
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="{{ Route::is('dashboard.projects.view', $data->id) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.projects.view',$data->id) }}"><i class="icon-info"></i> {{ trans('lang.general') }}</a>
                </li>
                <li class="{{ Route::is('dashboard.projects.images',$data->id) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.projects.images',$data->id) }}"><i class="icon-picture"></i> {{ trans('lang.images') }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
