<?php

namespace OpenStrong\StrongAdmin\Http\Controllers;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string|null  $view
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $data
     * @param  array  $mergeData
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    protected function view($view = null, $data = [], $mergeData = [])
    {
        if ($view)
        {
            $view = 'strongadmin::' . $view;
        }
        return view($view, $data, $mergeData);
    }

}