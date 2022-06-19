<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReportCollection;
use App\Models\Report;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class ReportsController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Reports/Index', [
            'filters' => Request::all('search'),
            'reports' => new ReportCollection(
                Report::filter(Request::only('search'))
                    ->paginate(10)
                    ->appends(Request::all())
            )
        ]);
    }
}
