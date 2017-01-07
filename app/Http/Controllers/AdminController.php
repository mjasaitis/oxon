<?php
namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use Response;

class AdminController extends Controller
{
    public $model;      // CRUD resource
    public $form;       // Form object
    public $pageTitle;  // Page title
    public $pageUrl;    // Administration module url
    public $table;      // Table configuration

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        View::share("pageTitle", $this->pageTitle);
        View::share("pageUrl", $this->pageUrl);
        
        if (isset($this->table)) {
            View::share("table", $this->table);

            // Get list of model items
            $tableData = isset($this->table['query']) ? $this->table['query']->get() : $this->model->get();
            View::share("tableData", $tableData);
        }
        return View::make('admin.generic_page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        View::share("pageTitle", $this->pageTitle);
        View::share("pageUrl", $this->pageUrl);
        View::share("formTitle", "Create category");
        View::share("formFields", $this->form->getFields());
        return View::make('admin.form.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->form->getValidationRules());
        $this->model->fill($request->all());
        
        foreach ($this->form->getExtraFields() as $key => $value) {
            $this->model->$key = $value;
        }
        
        $this->model->save();
        return redirect($this->pageUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->model->findOrFail($id);

        View::share("data", $data);
        View::share("pageTitle", $this->pageTitle);
        View::share("pageUrl", $this->pageUrl);
        View::share("formFields", $this->form->getFields());
        return View::make('admin.form.form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, $this->form->getValidationRules($id));
        $model = $this->model->findOrFail($id);
        $model->update($request->all());
        return redirect($this->pageUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $model = $this->model->find($id);
        if (!$model) {
            $deleted = false;
        } else {
            $model->delete($id);
            $deleted = true;
        }
        return Response::json(['deleted' => $deleted ]);
    }
}
