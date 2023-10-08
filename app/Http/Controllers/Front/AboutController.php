<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\GeneralController;
use App\Models\About;
use App\Models\Feature;
use App\Models\OurCustomer;

class AboutController extends GeneralController
{
    protected $viewPath = 'about.';
    protected $path = 'about';

    public function __construct(About $model)
    {
        parent::__construct($model);
    }


    /**
     * Show Index Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

       return view('front.about.index',[
            'partners' => OurCustomer::get(),
            'about' => About::findOrFail(1),
            'about2' => About::findOrFail(2),
            'metaBanner' => $this->GetMeta($this->path),
            'features' => Feature::where('type','global')->get(),

       ]);
    }
}
