<?php

namespace App\Http\Controllers;

use App\Models\FormulairePublication;
use App\Models\FormulaireRevision;
use App\Models\FormulaireTraduction;


class ChartController extends Controller
{
    public function chartServices()
    {
        $publication = FormulairePublication::count();
        $revision = FormulaireRevision::count();
        $traduction = FormulaireTraduction::count();

        return view('charts.services', [
            'publication' => $publication,
            'revision' => $revision,
            'traduction' => $traduction
        ]);
    }
}
