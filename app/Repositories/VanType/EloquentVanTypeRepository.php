<?php namespace App\Repositories\VanType;

use App\Models\VanType\VanType;
use App\Models\Site\Site;
use App\Repositories\DbRepository;
use App\Exceptions\GeneralException;
use Session;
use App\Models\VanType\VanTypeSetting;
use App\Http\Utilities\FileUploads;

class EloquentVanTypeRepository extends DbRepository implements VanTypeRepositoryContract
{
	/**
	 * VanType Model
	 * 
	 * @var Object
	 */
	public $model;

	/**
	 * Module Title
	 * 
	 * @var string
	 */
	public $moduleTitle = 'VanType';

	/**
	 * Table Headers
	 *
	 * @var array
	 */
	public $tableHeaders = [
		'name' 			=> 'VanType Name',
		'username' 		=> 'User Name',
		'title' 		=> 'Title',
		'start_date' 	=> 'Start Date',
		'end_date' 		=> 'End Date',
		'actions' 		=> 'Actions'
	];

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
		'username' => [
			'data' 			=> 'username',
			'name' 			=> 'username',
			'searchable' 	=> true, 
			'sortable'		=> true
		],
		'title' => [
			'data' 			=> 'title',
			'name' 			=> 'title',
			'searchable' 	=> true, 
			'sortable'		=> true
		],
		'start_date' => [
			'data' 			=> 'start_date',
			'name' 			=> 'start_date',
			'searchable' 	=> false, 
			'sortable'		=> false
		],
		'end_date' => [
			'data' 			=> 'end_date',
			'name' 			=> 'end_date',
			'searchable' 	=> false, 
			'sortable'		=> false
		],
		'actions' => [
			'data' 			=> 'actions',
			'name' 			=> 'actions',
			'searchable' 	=> false, 
			'sortable'		=> false
		]
	];

	/**
	 * Is Admin
	 * 
	 * @var boolean
	 */
	protected $isAdmin = false;

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
	 * Module Routes
	 * 
	 * @var array
	 */
	public $moduleRoutes = [
		'listRoute' 	=> 'van-type.index',
		'createRoute' 	=> 'van-type.create',
		'storeRoute' 	=> 'van-type.store',
		'editRoute' 	=> 'van-type.edit',
		'updateRoute' 	=> 'van-type.update',
		'deleteRoute' 	=> 'van-type.delete',
		'dataRoute' 	=> 'van-type.get-list-data',
        'showRoute'     => 'van-type.show'
	];

	/**
	 * Module Views
	 * 
	 * @var array
	 */
	public $moduleViews = [
		'listView' 		=> 'van-type.index',
		'createView' 	=> 'van-type.create',
		'editView' 		=> 'van-type.edit',
		'deleteView' 	=> 'van-type.destroy',
        'showView'      => 'van-type.show'
	];

	/**
	 * Construct
	 *
	 */
	public function __construct()
	{
		$this->model 		= new VanType;
		$this->siteModel 	= new Site;
		$this->vanTypeSetting = new VanTypeSetting();
	}

	/**
	 * Create VanType
	 *
	 * @param array $input
	 * @return mixed
	 */
	public function create($input)
	{
		$input = $this->prepareInputData($input, true);
		$model = $this->model->create($input);

		if($model)
		{
		    $this->saveSettings($input, $model, true);

			return $model;
		}

		return false;
	}

    /**
     * Save Settings
     *
     * @param $input
     * @param bool $model
     * @param bool $isCreate
     * @return bool
     */
	public function saveSettings($input, $model = false, $isCreate = false)
    {
        if($isCreate)
        {
            foreach($input['setting'] as $singleKey => $singleValue)
            {
                $singleValue['van_type_id'] = $model->id;
                $this->vanTypeSetting->create($singleValue);
            }
        }
        else
        {
            foreach($input['setting'] as $singleKey => $singleValue)
            {
                if(isset($singleValue['id']) && $singleValue['id'])
                {
                    $settingModel = $this->vanTypeSetting->find($singleValue['id']);
                    $settingModel->update($singleValue);
                }
                else
                {
                    $singleValue['van_type_id'] = $model->id;
                    $this->vanTypeSetting->create($singleValue);
                }
            }
        }
        return true;
    }

	/**
	 * Update VanType
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
			$input = $this->prepareInputData($input);		
            $flag = $model->update($input);

            $this->saveSettings($input, $model);

			return $flag;
		}

		return false;
	}

	/**
	 * Destroy VanType
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
			$this->model->getTable().'.type',
			$this->model->getTable().'.created_at'
		];
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
    	return  $this->model->select($this->getTableFields())
    			->get();
        
    }

    /**
     * Set Admin
     *
     * @param boolean $isAdmin [description]
     */
    public function setAdmin($isAdmin = false)
    {
    	$this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Prepare Input Data
     * 
     * @param array $input
     * @param bool $isCreate
     * @return array
     */
    public function prepareInputData($input = array(), $isCreate = false)
    {
        if($isCreate)
    	{
    		$input = array_merge($input, ['site_id' => Session::get('siteId')]);
    	}

        if(!empty($input['picture']))
        {
            $fileUpload = new FileUploads();
            $fileUpload->setBasePath('vantypes');

            $image = $fileUpload->upload($input['picture']);

            $input['picture'] = $image;
        }
    	return $input;
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
}