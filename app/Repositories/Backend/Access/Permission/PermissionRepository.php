<?php

namespace App\Repositories\Backend\Access\Permission;

use App\Repositories\BaseRepository;
use App\Models\Access\Permission\Permission;
use App\Repositories\DbRepository;

/**
 * Class PermissionRepository.
 */
class PermissionRepository extends DbRepository
{
	/**
	 * Permission Model
	 * 
	 * @var Object
	 */
	public $model;

	/**
	 * Admin Route Prefix
	 * 
	 * @var string
	 */
	public $adminRoutePrefix = 'admin';

	/**
	 * Client Route Prefix
	 * 
	 * @var string
	 */
	public $clientRoutePrefix = 'frontend';

	/**
	 * Admin View Prefix
	 * 
	 * @var string
	 */
	public $adminViewPrefix = 'backend';

	/**
	 * Client View Prefix
	 * 
	 * @var string
	 */
	public $clientViewPrefix = 'frontend';

	/**
	 * Module Title
	 * 
	 * @var string
	 */
	public $moduleTitle = 'Permission';

	/**
	 * Table Headers
	 *
	 * @var array
	 */
	public $tableHeaders = [
		'name' 				=> 'Name',
		'display_name' 		=> 'Display Name',
		'actions' 			=> 'Actions'
	];

	/**
	 * Module Routes
	 * 
	 * @var array
	 */
	public $moduleRoutes = [
		'listRoute' 	=> 'access.permission.index',
		'createRoute' 	=> 'access.permission.create',
		'storeRoute' 	=> 'access.permission.store',
		'editRoute' 	=> 'access.permission.edit',
		'updateRoute' 	=> 'access.permission.update',
		'deleteRoute' 	=> 'access.permission.destroy',
		'dataRoute' 	=> 'access.permission.get-list-data'
	];

	/**
	 * Module Views
	 * 
	 * @var array
	 */
	public $moduleViews = [
		'listView' 		=> 'access.permission.index',
		'createView' 	=> 'access.permission.create',
		'editView' 		=> 'access.permission.edit',
		'deleteView' 	=> 'access.permission.destroy',
	];

	/**
	 * Is Admin
	 * 
	 * @var boolean
	 */
	protected $isAdmin = true;

	/**
	 * Table Columns
	 *
	 * @var array
	 */
	public $tableColumns = [
		'name' =>	[
			'data' 			=> 'name',
			'name' 			=> 'name',
			'searchable' 	=> true, 
			'sortable'		=> true
		],
		'display_name' => [
			'data' 			=> 'display_name',
			'name' 			=> 'display_name',
			'searchable' 	=> true, 
			'sortable'		=> true
		],
		'actions' => [
			'data' 			=> 'actions',
			'name' 			=> 'actions',
			'searchable' 	=> false, 
			'sortable'		=> false
		]
	];

    /**
     * Associated Repository Model.
     */
    const MODEL = Permission::class;

    /**
     * Construct
     *
     */
    public function __construct()
    {
    	$this->model 		= new Permission;
    }

	/**
	 * Create Permission
	 *
	 * @param array $input
	 * @return mixed
	 */
	public function create($input)
	{
		$model = $this->model->create($input);

		if($model)
		{
			return $model;
		}

		return false;
	}	

	/**
	 * Update Permission
	 *
	 * @param int $id
	 * @param array $input
	 * @return bool|int|mixed
	 */
	public function update($id, $input)
	{
		$model = $this->model->find($id);

		if($model)
		{
			return $model->update($input);
		}

		return false;
	}

	/**
	 * Destroy Permission
	 *
	 * @param int $id
	 * @return mixed
	 * @throws GeneralException
	 */
	public function destroy($id)
	{
		$model = $this->model->find($id);
			
		if($model)
		{
			return $model->delete();
		}

		return  false;
	}

	/**
     * Get All
     *
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getAll($orderBy = 'id', $sort = 'asc')
    {
        return $this->model->all();
    }

	/**
     * Get by Id
     *
     * @param int $id
     * @return mixed
     */
    public function getById($id = null)
    {
    	if($id)
    	{
    		return $this->model->find($id);
    	}
        
        return false;
    }  

    /**
     * Get Table Fields
     * 
     * @return array
     */
    public function getTableFields()
    {
    	return [
			$this->model->getTable().'.id as id',
			$this->model->getTable().'.name',
			$this->model->getTable().'.display_name'
		];
    }

    /**
     * Get Table Headers
     * 
     * @return string
     */
    public function getTableHeaders()
    {
    	if($this->isAdmin)
    	{
    		return json_encode($this->setTableStructure($this->tableHeaders));
    	}

    	$clientHeaders = $this->tableHeaders;

    	unset($clientHeaders['username']);

    	return json_encode($this->setTableStructure($clientHeaders));
    }

	/**
     * Get Table Columns
     *
     * @return string
     */
    public function getTableColumns()
    {
    	if($this->isAdmin)
    	{
    		return json_encode($this->setTableStructure($this->tableColumns));
    	}

    	$clientColumns = $this->tableColumns;

    	unset($clientColumns['username']);
    	
    	return json_encode($this->setTableStructure($clientColumns));
    }

    /**
     * Get For DataTable
     * 
     * @return mixed
     */
    public function getForDataTable()
    {
    	return  $this->model->select($this->getTableFields())
    			->get();
        
    }
}
