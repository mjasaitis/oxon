<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use Response;
use App\Video;
use Yajra\Datatables\Facades\Datatables;

class VideosController extends Controller
{
    /**
     * Get Youtube video information
     *
     * @param  Request $request
     * @return array
     */
    public function postYoutubeInfo(Request $request)
    {
        $response = (new Video)->getYoutubeInfo($request->input('youtube_id'));
        return Response::json($response);
    }

    /**
     * Get data from eloquent model in datatables format
     *
     * @return object
     */
    public function getList()
    {
        return Datatables::eloquent(Video::query()->select("thumbnail", "title", "views", "comments", "youtube_id"))->make(true);
    }
}
