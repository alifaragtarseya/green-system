<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\GeneralController;
use App\Http\Requests\Front\Messages\StoreMessage;
use App\Models\Messages;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends GeneralController
{
    protected $viewPath = 'contact.';
    protected $path = 'contact';

    public function __construct(Messages $model)
    {
        parent::__construct($model);
    }


    /**
     * Display Index Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Get Meta & Banner From DB
        $metaBanner = $this->GetMeta($this->path);
        // Set Meta Home
        $this->metaGenerate($this->GetMeta($this->path));
        return view($this->frontView($this->viewPath . 'index'), compact('metaBanner'));
    }

    public function store(StoreMessage $request)
    {
        // Get Inputs From Request
        $data = $request->validated();
        // Store Message in DB
        $this->model->create($data);
        // Set Inputs
        $data['email_info'] = $this->setting()->email_1;
        // Set Messages
        $data['details'] = $request->input('message');
        // Send Mail
        Mail::send($this->frontView($this->viewPath . 'send'),$data, function($message) use($data)
        {
            $message->from($data['email']);
            $message->to($data['email_info'])->subject($this->setting()->site_name);
        });
        $this->flash('success', __('lang.send_messages'));
        return back();
    }
}
