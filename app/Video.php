<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;
use Config;

class Video extends Model
{
    protected $fillable = ['youtube_id', 'title', 'thumbnail', 'comments', 'views', 'user_id'  ];

    /**
    * Dynamic accessor to provide the total number of users an entity has.
    *
    * @var string $value
    * @return string
    */
    public function getThumbnailAttribute($value)
    {
        if (Request::segment(1) == 'admin') {
            return $value;
        } else {
            return '<a href="https://www.youtube.com/watch?v=' . $this->youtube_id . '" target="_blank"><img src="'.$value.'"></a>';
        }
    }

    /**
     *  Get Youtube video info
     *
     * @var string $youtubeId
     * @return string
     */
    public function getYoutubeInfo($youtubeId)
    {
        $url = 'https://www.googleapis.com/youtube/v3/videos?part=statistics,snippet&id=' . $youtubeId . '&key=' . Config::get('youtube.api_key');

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);

        if ($response !== false) {
            $response = json_decode($response, true);
        }
        
        return $response;
    }
}
