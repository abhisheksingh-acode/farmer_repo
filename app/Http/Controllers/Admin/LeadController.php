<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function contact()
    {
        return view("admin.lead.contact");
    }

    public function career()
    {
        return view("admin.lead.career");
    }


    public function distributor()
    {
        return view("admin.lead.distributer");
    }

    public function all()
    {
        return view("admin.lead.all");
    }
}
