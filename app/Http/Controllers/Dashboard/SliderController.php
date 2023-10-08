<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Dashboard\Meta\UpdateMeta;
use App\Http\Requests\Dashboard\Slider\StoreSlider;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderController extends GeneralController
{
    protected $viewPath = 'slider.';
    protected $path = 'slider';
    private $route = 'dashboard.slider';

    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }

    /**
     * Get All Data Model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Get & Check Data
        $data = $this->model->take(1)->get();
        return view($this->viewPath($this->viewPath . 'index'), compact('data'));
    }

    /**
     * View Page Add Image Slider
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view($this->viewPath($this->viewPath . 'create'));
    }

  /**
     * Store Image Slider
     * @param StoreSlide $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreSlider $request)
    {
        $inputs = $request->validated();
        // Set Images in Inputs request
        $inputs['image'] = $this->uploadImage($inputs['image'], $this->path, null, 1920, 800);
        // Store Images in DB
        DB::beginTransaction();
        $this->model->create($inputs);
        DB::commit();
        $this->flash('success', __('lang.stored'));
        return redirect(route($this->route));
    }


    /**
     * View Page Edit Item
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        return view($this->viewPath($this->viewPath . 'edit'), compact('data'));
    }




    /**
     * Update Data in DB
     * @param StoreSlide $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreSlider $request, $id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Get data from request
        $inputs = $request->validated();
        // If Request Has File
        if($request->hasFile('image')) {
            // Set Image in inputs data
            $inputs['image'] = $this->uploadImage($inputs['image'], $this->path, $data->image, 1920, 800);
        }
        // Update Data in DB
        DB::beginTransaction();
        $data->update($inputs);
        DB::commit();
        $this->flash('success', __('lang.updated'));
        return redirect(route($this->route));
    }



    /**
     * Delete Image from DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Delete Image
        $this->deleteImage($data->image);
        // Delete Data
        $data->delete();
        $this->flash('success', __('lang.deleted'));
        return back();
    }


      /**
     * Hidden or Show Data in DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function status($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Check If Hidden Data
        if ($data->hide == 1) {
            $data->update(['hide' => 0]);
            $this->flash('success', __('lang.show'));
        } else {
            $data->update(['hide' => 1]);
            $this->flash('success', __('lang.hide'));
        }
        return back();
    }



    /**
     * View Form Edit Meta
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function meta()
    {
        // Get data meta from DB
        $data = $this->GetMeta('home');
        return view($this->viewPath('meta.index'), compact('data'));
    }


    /**
     * Update Data Meta in DB
     * @param UpdateMeta $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function metaUpdate(UpdateMeta $request)
    {
        $this->UpdateMeta($request, 'home');
        $this->flash('success', __('lang.updated'));
        return redirect(route($this->route . '.meta'));
    }
}
