<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Dashboard\Meta\UpdateMeta;
use App\Models\Messages;
use Illuminate\Support\Facades\Request;

class ContactController extends GeneralController
{
    protected $viewPath = 'contact.';
    protected $path = 'contact';
    private $route = 'dashboard.contact';

    public function __construct(Messages $model)
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
        if(Request::is('dashboard/contact*')) {
            $data = $this->getData()->where('service_id', null)->paginate($this->paginate);

        } else {
            $data = $this->getData()->where('service_id', '!=', null)->paginate($this->paginate);
        }
        return view($this->viewPath($this->viewPath . 'index'), compact('data'));
    }


    /**
     * View Details Item
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Check & Update View Data
        if(!$data->view) {
            $data->update(['view' => 1]);
        }
        return view($this->viewPath($this->viewPath . 'view'), compact('data'));
    }


    /**
     * Delete Item From DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        // Get & Delete Item
        $this->GetItem($id)->delete();
        $this->flash('success', __('lang.deleted'));

        if(Request::is('dashboard/contact*')) {
            return redirect(route($this->route));
        } else {
            return redirect(route('dashboard.requests'));
        }
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
