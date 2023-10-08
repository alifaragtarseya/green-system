<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Dashboard\Meta\UpdateMeta;
use App\Http\Requests\Dashboard\Products\StoreImages;
use App\Http\Requests\Dashboard\Products\StoreProduct;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends GeneralController
{
    protected $viewPath = 'products.';
    protected $path = 'products';
    private $route = 'dashboard.products';

    public function __construct(Product $model)
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
        $categories = Category::latest()->get();
        // Get Data Icons From File
        return view($this->viewPath($this->viewPath . 'create'), compact('categories'));
    }


    /**
     * Store Data in DB
     * @param StoreProduct $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreProduct $request)
    {
        // Get data from request
        $inputs = $request->validated();
        // Push Image Inside Inputs Request
        $inputs['image'] = $this->uploadImage($request->file('image'), $this->path, null, null, null, null);
        // Store Data in DB
        $data = $this->model->create($inputs);
        // Assign Images To Product Images
        $data->images()->create($inputs);

        if ($inputs['category_id'] > 0) {

            foreach ($inputs['category_id'] as $key => $categoryId) {
                ProductCategory::create([
                    'product_id'    =>  $data->id,
                    'category_id'    =>  $categoryId,
                ]);
            }
        }
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
        $categories = Category::latest()->get();
        $categoriesId = ProductCategory::where('product_id', $id)->pluck('category_id')->toArray();
        return view($this->viewPath($this->viewPath . 'view'), compact('data', 'categories', 'categoriesId'));
    }


    /**
     * Update Data in DB
     * @param StoreProduct $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreProduct $request, $id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Get data from request
        $inputs = $request->validated();
        // Update Data in DB
        $data->update($inputs);


        if ($inputs['category_id'] > 0) {
            ProductCategory::where('product_id',$data->id)->delete();

            foreach ($inputs['category_id'] as $key => $modelId) {
                ProductCategory::create([
                    'product_id'    =>  $data->id,
                    'category_id'    =>  $modelId,
                ]);
            }
        }

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

    public function features($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        return view($this->viewPath($this->viewPath . 'features'), compact('data'));
    }

    public function featuresCreate($id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        return view($this->viewPath($this->viewPath . 'features_form'), compact('data'));
    }

    public function featureStore(Request $request, $id)
    {
        // Get and Check Data
        $data = $this->GetItem($id);
        // Set Product ID in Inputs request
        $request->validate([
            'product_id'    => 'required',
            'icon'    => 'required',
            'ar.title'  =>'required|string|max:150',
            'en.title'  =>'required|string|max:150',
            'ar.description'  =>'nullable',
            'en.description'  =>'nullable',
        ]);


        $inputs = $request->all();

        $inputs['icon'] = $this->uploadImage($request->file('icon'), $this->path, $data->icon, 817, 408);

        // dd($inputs);
        ProductFeature::create($inputs);

        $this->flash('success', __('lang.stored'));
        return redirect(route('dashboard.products.features', $data->id));;
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
            // Assign Images To Product Images
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

    public function featureDelete($id, $featureId)
    {
        // Get and Check Data
        $data = $this->GetItem($id);

        $item = ProductFeature::where('id', $featureId)->where('product_id', $id)->first();
        if($item){
            // Delete Data
            $item->delete();
        }
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



}
