<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Dashboard\Meta\UpdateMeta;
use App\Http\Requests\Dashboard\Services\StoreService;
use App\Models\Services;

class ServicesController extends GeneralController
{
    protected $viewPath = 'services.';
    protected $path = 'services';
    private $route = 'dashboard.services';

    public function __construct(Services $model)
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
        $data = $this->getData()->paginate($this->paginate);
        return view($this->viewPath($this->viewPath . 'index'), compact('data'));
    }

    /**
     * View Page Add New Data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // Get Data Icons From File
        return view($this->viewPath($this->viewPath . 'create'));
    }


    /**
     * Store Data in DB
     * @param StoreService $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreService $request)
    {
        // Get data from request
        $inputs = $request->validated();
        // Push Image Inside Inputs Request
        if(isset($inputs['image']))
            $inputs['image'] = $this->uploadImage($request->file('image'), $this->path, null, 817, 408);
        // Store Data in DB
        $this->model->create($inputs);
        $this->flash('success', __('lang.stored'));
        return redirect(route($this->route));
    }


    /**
     * View Page Details Item
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        return view($this->viewPath($this->viewPath . 'view'), compact('data'));
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
     * @param StoreService $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreService $request, $id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Get data from request
        $inputs = $request->validated();
        // Push Image Inside Inputs Request
        $inputs['image'] = $this->uploadImage($request->file('image'), $this->path, $data->image, 817, 408);
        // Update Data in DB
        $data->update($inputs);
        $this->flash('success', __('lang.updated'));
        return redirect(route($this->route));
    }

    /**
     * Delete Data from DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Delete Image From Path
        $this->deleteImage($data->image);
        // Delete Data from DB
        $data->delete();
        $this->flash('success', __('lang.deleted'));
        return redirect(route($this->route));
    }


    /**
     * Hidden Or Show Data in DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function status($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Check If Hidden Data
        if($data->hide == 1) {
            $data->update(['hide' => 0]);
            $this->flash('success', __('lang.show_successfully'));
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
