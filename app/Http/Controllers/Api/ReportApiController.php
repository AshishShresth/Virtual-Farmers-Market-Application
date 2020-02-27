<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Report;
use Illuminate\Http\Request;

class ReportApiController extends Controller
{
    public function index(){
        $reports = Report::paginate();
        return ReportResource::collection( $reports );
    }

}
