<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\GeneralController;
use App\Models\Services;

class ServicesController extends GeneralController
{
    protected $viewPath = 'services.';
    protected $path = 'services';

    public function __construct(Services $model)
    {
        parent::__construct($model);
    }


    /**
     * Get Data From DB
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        if (request()->service_id) {
            $model = $this->GetItem(request()->service_id);
        }else{
            $model = $this->withOutHide()->first();
        }
       return view('front.services.index',[
        'services' => $this->withOutHide()->get(),
        'metaBanner' => $this->GetMeta($this->path),
        'data' => $model,

       ]);
    }


    /**
     * Get Details Data By Slug
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // Get Data By Slug
        $data = $this->GetItem($id);
        // Get Meta & Banner From DB
        $metaBanner = $this->GetMeta($this->path);
        // Set Meta Home
        $this->metaGenerate($data);
        // Get Services
        $services = $this->withOutHide()->get();
        return view($this->frontView($this->viewPath . 'view'), compact('data', 'services', 'metaBanner'));
    }
}
