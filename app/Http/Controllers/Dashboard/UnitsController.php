<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\Dashboard\Units\StoreUnit;
use App\Http\Requests\Dashboard\Units\UpdateUnit;
use App\Models\Units;
use Illuminate\Http\Request;

class UnitsController extends GeneralController
{

    protected $viewPath = 'units.';
    protected $path = 'units';
    private $redirect;

    public function __construct(Units $model)
    {
        parent::__construct($model);
        $this->redirect  = $this->url . $this->path;
    }


    /**
     * Get All Data Model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Get all data model
        $data = $this->model->get();
        return view($this->viewPath($this->viewPath . 'index'), compact('data'));
    }

    /**
     * Display Page Create New Item
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view($this->viewPath($this->viewPath . 'create'));
    }

    /**
     * Store Data Model IN DB
     * @param StoreUnit $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreUnit $request)
    {
        // Get Inputs From Request
        $inputs = $request->validated();
        // Store Data in DB
        $this->model->create($inputs);
        $this->flash('success', __('lang.stored'));
        return redirect($this->redirect);
    }

    /**
     * Display Page Edit Item
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // Get & Check Data
        $data = $this->GetItem($id);
        return view($this->viewPath($this->viewPath . 'edit'), compact('data'));
    }

    /**
     * Update Data in DB
     * @param UpdateUnit $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateUnit $request, $id)
    {
        // Get & Check Data
        $data = $this->GetItem($id);
        // Get Inputs From Request
        $inputs = $request->validated();
        // Update Data in DB
        $data->fill($inputs)->save();
        if($data->wasChanged())
            $this->flash('success', __('lang.updated'));
        return redirect($this->redirect);
    }

    /**
     * Delete Item From DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // Get & Check Data
        $data = $this->GetItem($id);
        // Delete Data From DB
        $data->delete();
        $this->flash('success', __('lang.deleted'));
        return redirect($this->redirect);
    }
}
