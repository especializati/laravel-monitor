<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class EndpointController extends Controller
{
    public function index(string $siteId)
    {
        $site = Site::with('endpoints')->find($siteId);
        if (!$site) {
            return back();
        }

        $endpoints = $site->endpoints;

        return view('admin.endpoints.index', compact('site', 'endpoints'));
    }
}
