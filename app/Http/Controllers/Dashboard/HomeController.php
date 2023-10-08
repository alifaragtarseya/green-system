<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use App\Models\Projects;
use App\Models\Services;

class HomeController extends Controller
{

    private function requests($operation)
    {
        return Messages::where('service_id', $operation, null)->count();
    }

    public function index()
    {
        // Get Data and Count All Data Categories
        $services = Services::orderBy('id', 'DESC')->where('hide', 0)->take(5)->get();
        $servicesCount = Services::count();
        // Get Data and Count All Data products
        $projects = Projects::orderBy('id', 'DESC')->where('hide', 0)->take(5)->get();
        $projectsCount = Projects::count();
        $messages = $this->requests('=');
        $requests = $this->requests('!=');

        return view('dashboard.index', compact('services', 'servicesCount', 'projects', 'projectsCount', 'messages', 'requests'));
    }
}
