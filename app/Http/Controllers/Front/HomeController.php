<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Front\Messages\StoreMessage;
use App\Models\About;
use App\Models\Blog;
use App\Models\Feature;
use App\Models\Messages;
use App\Models\OurCustomer;
use App\Models\OurWork;
use App\Models\Projects;
use App\Models\Services;
use App\Models\Slider;
use Illuminate\Support\Facades\Mail;

class HomeController extends GeneralController
{

    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }

    private function services()
    {
        return Services::where('hide', 0);
    }

    private function about($id)
    {
        return About::findOrFail($id) ;
    }

    public function index()
    {
        $metaBanner = $this->GetMeta('contact');
       return view('front.home.index' , [
            'sliders' => Slider::where('hide', 0)->get(),
            'features' => Feature::where('type','global')->get(),
            'services' => Services::where('hide', 0)->take(6)->get(),
            'blogs' => Blog::where('hide', 0)->take(6)->get(),
            'partners' => OurCustomer::get(),
            'about' => $this->about(1),
            'about2' => $this->about(2),
            'metaBanner' => $metaBanner,


        ]);
    }

    public function store(StoreMessage $request)
    {
        // Get Inputs From Request
        $data = $request->validated();
        // Get Service By Slug
        $service = Services::where('slug', $data['service_id'])->first();
        // Check Service
        if(!$service) abort(404);
        // Assign Service inside Data
        $data['service_id'] = $service->id;
        $data['service'] = $service->title;
        // Store Message in DB
        Messages::create($data);
        // Set Inputs
        $data['email_info'] = $this->setting()->email_1;
        // Set Messages
        $data['details'] = $request->input('message');
        // Send Mail
        Mail::send('front.contact.send',$data, function($message) use($data)
        {
            $message->from($data['email']);
            $message->to($data['email_info'])->subject('أستفسارات');
        });
        $this->flash('success', __('lang.send_messages'));
        return back();
    }
}
