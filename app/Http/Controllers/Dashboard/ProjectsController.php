<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Dashboard\Meta\UpdateMeta;
use App\Http\Requests\Dashboard\Projects\StoreImages;
use App\Http\Requests\Dashboard\Projects\StoreProject;
use App\Models\Projects;

class ProjectsController extends GeneralController
{
    protected $viewPath = 'projects.';
    protected $path = 'projects';
    private $route = 'dashboard.projects';

    public function __construct(Projects $model)
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
     * @param StoreProject $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreProject $request)
    {
        // Get data from request
        $inputs = $request->validated();
        // Push Image Inside Inputs Request
        $inputs['image'] = $this->uploadImage($request->file('image'), $this->path, null, null, null, null);
        // Store Data in DB
        $data = $this->model->create($inputs);
        // Assign Images To Project Images
        $data->images()->create($inputs);
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
     * Update Data in DB
     * @param StoreProject $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreProject $request, $id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Get data from request
        $inputs = $request->validated();
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
        $this->deleteImage($data->images->pluck('image')->toArray());
        // Delete Data from DB
        $data->delete();
        $this->flash('success', __('lang.deleted'));
        return redirect(route($this->route));
    }


    /**
     * View Page Edit Item
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function images($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        return view($this->viewPath($this->viewPath . 'images'), compact('data'));
    }


    /**
     * Store Image related to product id
     * @param StoreImages $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function imagesStore(StoreImages $request, $id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Set Product ID in Inputs request
        foreach ($request->file('images') as $im)
        {
            $inputs = [];
            // Set Images in Inputs request
            $inputs['image'] = $this->uploadImage($im, $this->path, null, 1000, null, 305);
            // Assign Images To Project Images
            $data->images()->create($inputs);
        }
        $this->flash('success', __('lang.stored'));
        return back();
    }


    /**
     * Delete Image from DB
     * @param $id
     * @param $img
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function imagesDelete($id, $img)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Get Data Item
        $item = $data->images()->findOrFail($img);
        // Delete Image
        $this->deleteImage($item->image);
        // Delete Data
        $item->delete();
        $this->flash('success', __('lang.deleted'));
        return back();
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
