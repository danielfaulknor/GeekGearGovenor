<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AssetRequest as StoreRequest;
use App\Http\Requests\AssetRequest as UpdateRequest;

class AssetCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Asset");
        $this->crud->setRoute("admin/asset");
        $this->crud->setEntityNameStrings('asset', 'assets');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->setFromDb();
        $this->crud->allowAccess('revisions');
        $this->crud->enableExportButtons();

        $this->crud->addField([
            'name' => 'title',
            'wrapperAttributes' => [
                'class' => 'col-md-4'
                ],
        ]);

        $this->crud->addField([
            'name' => 'description',
        ]);

        $this->crud->addField([
            'name' => 'barcode',
            'wrapperAttributes' => [
                'class' => 'col-md-4'
                ],
        ]);

        $this->crud->addField([
            'name' => 'quantity',
            'type' => 'number',
            'wrapperAttributes' => [
                'class' => 'col-md-2',
            ],
        ]);

        $this->crud->addField([
            'name' => 'value',
            'type' => 'number',
            'prefix' => "$",
            'suffix' => ".00",
            'wrapperAttributes' => [
                'class' => 'col-md-2',
            ],
        ]);

        $this->crud->addField([
            'name' => 'serial',
            'wrapperAttributes' => [
                'class' => 'col-md-4',
            ],
        ]);

        $this->crud->addField([
            'name' => 'missing_parts',
            'label' => 'Missing Parts',
            'type' => 'textarea',
        ]);

        $this->crud->removeColumn('missing_parts');

        $this->crud->addField([   
            'name' => 'photos',
            'label' => 'Photos',
            'type' => 'upload_multiple',
            'upload' => true,
            'disk' => 'uploads',
            'wrapperAttributes' => [
                'class' => 'col-md-4',
            ],
        ]);

        $this->crud->setColumnDetails('photos', [
            'type' => 'array'
        ]);

        $this->crud->addField([
            'name' => 'url',
            'label' => 'URL',
            'type' => 'url',
            'wrapperAttributes' => [
                'class' => 'col-md-8',
            ],
        ]);

        $this->crud->setColumnDetails('url',[
             'label' => "URL", // Table column heading
             'type' => "model_function",
             'function_name' => 'getUrlWithLink', // the method in your Model
        ]);

        $this->crud->addField([
            'name' => 'sale',
            'type' => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'col-md-4',
            ],
        ]);

        $this->crud->setColumnDetails('sale', [
            'label' => 'For Sale',
            'type' => 'boolean',
        ]);

        $this->crud->addField([
            'name' => 'public',
            'type' => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'col-md-4',
            ],
        ]);

        $this->crud->setColumnDetails('public', [
            'type' => 'boolean',
        ]);

        $this->crud->addField([
            'name' => 'new',
            'type' => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'col-md-4',
            ],
        ]);

        $this->crud->setColumnDetails('new', [
            'type' => 'boolean',
        ]);

        $this->crud->addField([
            'name' => 'category_id',
            'label' => 'Category',
            'type' => 'select2',
            'entity' => 'category',
            'attribute' => 'title',
            'model' => 'App\Models\Category',
            'wrapperAttributes' => [
                'class' => 'col-md-4',
            ],
        ]);


        $this->crud->setColumnDetails('category_id', [
            'name' => 'category_id',
            'label' => 'Category',
            'type' => 'select',
            'entity' => 'category',
            'attribute' => 'title',
            'model' => 'App\Models\Category',
        ]);

    }

	public function store(StoreRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}

	public function update(UpdateRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}
}
