<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ChefRequest as StoreRequest;
use App\Http\Requests\ChefRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ChefCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ChefCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Chef');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/chef');
        $this->crud->setEntityNameStrings('chef', 'chefs');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        $this->crud->setColumns(['name', 'email' ,'color','logo','created_at']);
      

        $this->crud->addField([
          'name' => 'name',
          'type' => 'text',
          'label' => "name"]);
          $this->crud->addField([
            'name' => 'email',
            'type' => 'email',
            'label' => "email"]); 
            $this->crud->addField([
                'name' => 'color',
                'type' => 'color',
                'label' => "color"]); 
                $this->crud->addField([
                    'name' => 'logo',
                    'type' => 'upload',
                    'label' => "logo"]);  
                                                      
        // add asterisk for fields that are required in ChefRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
