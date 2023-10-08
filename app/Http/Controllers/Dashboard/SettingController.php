<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Dashboard\Setting\UpdateSetting;
use App\Models\MySetting;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends GeneralController
{

    protected $viewPath = 'setting.';
    protected $path = 'setting';
    protected $quality = 100;


    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }


    /**
     * Get All Data Model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Get all data model
        $data = $this->model->first();
        return view($this->viewPath($this->viewPath . 'index'), compact('data'));
    }



    public function update(UpdateSetting $request)
    {
        // Get and Check Data
        $data = $this->model->first();
        // Check Data
        if(!$data) abort(404);
        // Get data from Request
        $inputs = $request->validated();
        $inputs['logo'] = $this->uploadImage($request->file('logo'), $this->path, $data->logo, null, null, null, null, 'png');
        $inputs['logo_white'] = $this->uploadImage($request->file('logo_white'), $this->path, $data->logo_white, null, null, null, null, 'png');
        $inputs['favicon'] = $this->uploadImage($request->file('favicon'), $this->path, $data->favicon, null, null, null, null, 'png');
        $inputs['favicon_white'] = $this->uploadImage($request->file('favicon_white'), $this->path, $data->favicon_white, null, null, null, null, 'png');
        $inputs['contact_us_img'] = $this->uploadImage($request->file('contact_us_img'), $this->path, $data->contact_us_img, null, null, null, null, 'png');
        // Update Data in DB
        $data->update($inputs);
        $this->flash('success', trans('lang.updated'));
        return back();
    }


    public function getMission(){
        $my_settings = MySetting::all();

        return view($this->viewPath($this->viewPath . 'mission'), compact('my_settings'));
    }

    public function getVision(){
        $my_settings = MySetting::all();

        return view($this->viewPath($this->viewPath . 'vision'), compact('my_settings'));
    }
    public function getPrinciple(){
        $my_settings = MySetting::all();

        return view($this->viewPath($this->viewPath . 'principle'), compact('my_settings'));
    }
    public function getGoal(){
        $my_settings = MySetting::all();

        return view($this->viewPath($this->viewPath . 'goal'), compact('my_settings'));
    }

    public function getAboutImages(){
        $my_settings = MySetting::all();

        return view($this->viewPath($this->viewPath . 'about_images'), compact('my_settings'));
    }

    public function updateMySetting(Request $request){
        $inputs = $request->except('_token');
        isset($inputs['goal_image']) ? $inputs['goal_image'] = $this->uploadImage($request->file('goal_image'), $this->path, $inputs['goal_image'], null, null, null, null, 'png') : '';
        isset($inputs['about_image_1']) ? $inputs['about_image_1'] = $this->uploadImage($request->file('about_image_1'), $this->path, $inputs['about_image_1'], null, null, null, null, 'png') : '';
        isset($inputs['about_image_2']) ? $inputs['about_image_2'] = $this->uploadImage($request->file('about_image_2'), $this->path, $inputs['about_image_2'], null, null, null, null, 'png') : '';
        isset($inputs['about_image_3']) ? $inputs['about_image_3'] = $this->uploadImage($request->file('about_image_3'), $this->path, $inputs['about_image_3'], null, null, null, null, 'png') : '';

        MySetting::setMany($inputs);
        $this->flash('success', trans('lang.updated'));
        return back();

    }
}
