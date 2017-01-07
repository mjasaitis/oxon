<?php namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use View;

class HomepageController extends BaseController
{
    /**
     * Displays administration homepage
     *
     * @return Response
     */
    public function getIndex()
    {
        return View::make('admin.frontpage.frontpage');
    }
}
