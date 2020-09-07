<?php namespace App\Controllers;
use App\Libraries\Crud;
class Staff extends BaseController
{
	protected $crud;
	function __construct()
	{
		$params = [
			'table' => 'staff',
			'dev' => false,
			'fields' => $this->field_options(),
			'form_title_add' => 'Add Staff',
			'form_title_update' => 'Edit Staff',
			'form_submit' => 'Add',
			'table_title' => 'Staffs',
			'form_submit_update' => 'Update',
			'base' => '',

		];

		$this->crud = new Crud($params, service('request'));
	}

	public function index()
	{
		$page = 1;
		if (isset($_GET['page'])) {
			$page = (int) $_GET['page'];
			$page = max(1, $page);
		}

		$data['title'] = $this->crud->getTableTitle();

		$per_page = 10;
		$columns = ['s_id', 's_firstname', 's_lastname', 's_email', 's_status', 's_position'];
		$where = null;
		$order = [
			['s_id', 'ASC']
		];
		$data['table'] = $this->crud->view($page, $per_page, $columns, $where, $order);
		
		return view('admin/users/table', $data);
	}

	public function add(){
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getAddTitle();

		if(is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);

		return view('admin/staff/form', $data);
	}

	public function edit($id)
	{
		if(!$this->crud->current_values($id))
			return redirect()->to($this->crud->getBase() . '/' . $this->crud->getTable());

		$data['item_id'] = $id;
		$data['form'] = $form = $this->crud->form();
		$data['title'] = $this->crud->getEditTitle();

		if (is_array($form) && isset($form['redirect']))
			return redirect()->to($form['redirect']);
		
		return view('admin/staff/form', $data);
	}
	
	public function delete($id)
    {	
    	
        $table = $this->crud->getTable();
        
        $field = 's_id';
		$where = [ $field => $id];
		
		$item = $this->crud->deleteItemstaff($table, $id);


		if (!$item)
			$this->crud->flash('warning', 'File could not be deleted');
		else {

			$this->crud->flash('success', 'Staff was deleted');
		}
		

		return redirect()->to($this->crud->getBase() . '/crud/' . $this->crud->getTable());
    }
	protected function field_options()
	{
		$fields = [];
		$field['s_id'] = ['label' => 'ID'];
		$fields['s_firstname'] = ['label' => 'First Name', 'required' => true, 'helper' => 'Type your First name', 'class' => 'col-12 col-sm-6'];
		$fields['s_lastname'] = ['label' =>'Last Name', 'required' => true, 'helper' => 'Type your Last name', 'class' => 'col-12 col-sm-6'];
		$fields['s_email'] = ['label' => 'Email','required' => true, 'unique' => [true, 's_email']];
		$fields['s_position'] = ['label' => 'Position','required' => true,];
		$fields['s_status'] = ['label' => 'Status','required' => true,];
		$fields['s_created_at'] = ['label' => 'Created at', 'only_edit' => true];
		$fields['s_password'] = ['label' => 'Password',
		 'required' => true, 
		 'only_add' => true,
		 'type' => 'password',
			'class' => 'col-12 col-sm-6',
		 'confirm' => true, 
		 'password_hash' => true];

		return $fields;
	}
}