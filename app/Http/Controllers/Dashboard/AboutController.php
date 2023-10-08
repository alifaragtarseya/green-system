<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Dashboard\About\StoreAbout;
use App\Http\Requests\Dashboard\Meta\UpdateMeta;
use App\Models\About;

class AboutController extends GeneralController
{
    protected $viewPath = 'about.';
    protected $path = 'about';
    private $route = 'dashboard.about';

    public function __construct(About $model)
    {
        parent::__construct($model);
    }

    /**
     * Get All Data Model
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        // Get & Check Data
        $data = $this->GetItem($id);
        return view($this->viewPath($this->viewPath . 'index'), compact('data'));
    }


    /**
     * Update Data in DB
     * @param StoreAbout $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreAbout $request, $id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Get data from request
        $inputs = $request->validated();
        // Push Image Inside Inputs Request
        $inputs['image'] = $this->uploadImage($request->file('image'), $this->path, $data->image);
        // Update Data in DB
        $data->update($inputs);
        $this->flash('success', __('lang.updated'));
        return redirect(route($this->route, $data->id));
    }


    /**
     * View Form Edit Meta
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function meta()
    {
        // Get data meta from DB
        $data = $this->GetMeta($this->path);
        return view($this->viewPath('meta.index'), compact('data'));
    }


    /**
     * Update Data Meta in DB
     * @param UpdateMeta $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function metaUpdate(UpdateMeta $request)
    {
        $this->UpdateMeta($request, $this->path);
        $this->flash('success', __('lang.updated'));
        return redirect(route($this->route . '.meta'));
    }
}
