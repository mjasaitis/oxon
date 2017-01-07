<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Form;
use App\Video;
use Auth;

class VideosController extends AdminController
{
    /**
     * Construstor
     *
     * @return void
     */
    public function __construct(Form $form, Video $video)
    {
        $this->model = $video;
        $this->form = $form;

        $userId = Auth::user()->id;

        $this->pageTitle = 'Videos';
        $this->pageUrl = '/admin/videos';

        // Form fields to create/update model
        $formFields = [

            'youtube_id' => [
                'title' => 'Youtube ID',
                'type' => 'youtube',
                'validate' => 'required|unique:videos,youtube_id|max:255'
            ],

            'thumbnail' => [
                'title' => 'Thumbnail url',
                'type' => 'text',
                'validate' => 'required|max:255|url'
            ],

            'title' => [
                'title' => 'Title',
                'type' => 'text',
                'validate' => 'required|max:255'
            ],

            'views' => [
                'title' => 'Views count',
                'type' => 'text',
                'validate' => 'required|integer'
            ],

            'comments' => [
                'title' => 'Comments count',
                'type' => 'text',
                'validate' => 'required|integer'
            ],

        ];
        $this->form->setFields($formFields);
        
        // Set model extra attributes that will be assigned on model creation
        $this->form->setExtraFields(['user_id' => $userId ]);

        // Table info for resourses list
        $this->table = [
            'cells' => [
                        [ 'name' => 'thumbnail', 'type'=> 'image', 'title' => 'Thumbnail' ],
                        [ 'name' => 'youtube_id', 'title'=> 'Youtube ID' ],
                        [ 'type' => 'edit', 'title'=> 'Edit' ],
                        [ 'type' => 'delete', 'title'=> 'Delete' ],
                    ],
            'query' => $this->model->where('user_id', $userId)
        ];
    }
}
