<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\GeneralController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProductController extends GeneralController
{

    protected $viewPath = 'products.';
    protected $path = 'products';

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }


    /**
     * Get Data From DB
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = $this->model->where(function ($q) use ($request) {
            Product::scopeFilter($q , $request);
        });

        return view('front.products.index',[
            'categories' => Category::latest()->get(),
            'products' => $query->latest()->paginate(20),
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
        // $metaBanner = $this->GetMeta($this->path);
        // Set Meta Home
        // $this->metaGenerate($data);
        // // Get Services
        // $projects = $this->withOutHide()->get();
        return view($this->frontView($this->viewPath . 'view'), compact('data'));
    }
}
