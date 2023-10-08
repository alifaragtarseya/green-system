<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Dashboard\Meta\UpdateMeta;
use App\Http\Requests\Dashboard\Services\StoreService;
use App\Http\Requests\Dashboard\Categories\StoreCategory;
use App\Models\Services;
use App\Models\Category;

class CategoryController extends GeneralController
{
    protected $viewPath = 'categories.';
    protected $path = 'categories';
    private $route = 'dashboard.categories';

    public function __construct(Category $model)
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
     * @param StoreCategory $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreCategory $request)
    {
        // Get data from request
        $inputs = $request->validated();

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
     * @param StoreCategory $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreCategory $request, $id)
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



}
