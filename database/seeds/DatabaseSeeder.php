<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users groups data
        $data = [
            [
                'name' => 'agent',
                'permissions' => json_encode(['video_view' => 1 ])
            ],
            [
                'name' => 'teamleader',
                'permissions' => json_encode(['video_view' => 1, 'video_admin' => 1 ])
            ],

        ];

        // Create groups
        foreach ($data as $key => $value) {
            \App\UserGroup::create($value);
        }

        // Users data
        $data = [
            [
                'name' => 'Agent',
                'email' => 'agent@example.com',
                'password' => bcrypt('111111'),
                'group_id' => 1,
            ],
            [
                'name' => 'Team Leader',
                'email' => 'admin@example.com',
                'password' => bcrypt('111111'),
                'group_id' => 2,
            ],

        ];

        // Create users
        foreach ($data as $key => $value) {
            \App\User::create($value);
        }

        // Video data
        $data = [
            [ 'youtube_id' => 'UBS6MM05KdY', 'user_id' => 2 ],
            [ 'youtube_id' => 'aUmCw_Rzrpg', 'user_id' => 2  ],
            [ 'youtube_id' => 'jaTQ3WRKo64', 'user_id' => 2  ],
            [ 'youtube_id' => 'jPJNt1eTVNY', 'user_id' => 2  ],
            [ 'youtube_id' => '9wJ1jlCwI4o', 'user_id' => 2  ],
            [ 'youtube_id' => 'RxHDvWMZvsk', 'user_id' => 2  ],
            [ 'youtube_id' => 'yG96RttfZtM', 'user_id' => 2  ],
            [ 'youtube_id' => 'EWk1r8Rbf9g', 'user_id' => 2  ],
            [ 'youtube_id' => 'FGUj1BDcqKU', 'user_id' => 2  ],
            [ 'youtube_id' => '1LXsm9y-z3I', 'user_id' => 2  ],
            [ 'youtube_id' => '-C5FyX54PeM', 'user_id' => 2  ],
            [ 'youtube_id' => 'uz0EAMDsyVc', 'user_id' => 2  ],
            [ 'youtube_id' => 'cNzWS2M2jDM', 'user_id' => 2  ],
            [ 'youtube_id' => 'MlTShNhwmYA', 'user_id' => 2  ],
        ];

        // Create videos
        foreach ($data as $key => $value) {
            $video = new \App\Video();

            $youtubeData = $video->getYoutubeInfo($value['youtube_id']);

            if (isset($youtubeData['items'][0])) {
                $item = $youtubeData['items'][0];
                $value['title'] = $item['snippet']['title'];
                $value['thumbnail'] = $item['snippet']['thumbnails']['default']['url'];
                $value['views'] = $item['statistics']['viewCount'];
                $value['comments'] = $item['statistics']['commentCount'];
                $video->create($value);
            }
        }
    }
}
