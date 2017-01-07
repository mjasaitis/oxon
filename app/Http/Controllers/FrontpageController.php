<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use View;

class FrontpageController extends Controller
{

    /**
     * Frontpage index
     *
     * @return void
     */
    public function getIndex()
    {
        return View::make("frontpage");
    }
}
