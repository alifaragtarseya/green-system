<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\GeneralController;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends GeneralController
{
    protected $viewPath = 'blogs.';
    protected $path = 'blogs';

    public function __construct(Blog $model)
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
            $this->model->scopeFilter($q , $request);
        });

        return view('front.blogs.index',[
            'categories' => Category::latest()->get(),
            'blogs' => $query->latest()->paginate(20),
            "metaBanner" => $this->GetMeta($this->path),

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
        $all_blogs  = Blog::latest()->get()->take(8);
        $metaBanner = $this->GetMeta($this->path);

        return view($this->frontView($this->viewPath . 'view'), compact('data', 'all_blogs','metaBanner'));
    }
}
