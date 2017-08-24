<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 * PataMarks - Extending CI_Model
 * @package     PataMarks
 * @author      Makhanu Sinja
 * @copyright   Copyright (c) 2016 - 2017 Makhanu Sinja(http://imakhs.com)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://github.com/makhsinja/patamarks
 *
 * Community Auth - MY Model
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2016, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 *
 * I decided it was important to have the ACL related 
 * methods here because then I can access them from any model.
 * This has been especially useful in websites I work on.
 */
class MY_Model extends CI_Model
{
	/**
	 * ACL for a logged in user
	 * @var mixed
	 */
	const ACL = NULL;
	const DB_TABLE = 'abstract';//Referred to as $this::DB_TABLE
    const DB_TABLE_PK = 'abstract';//Referred to as $this::DB_TABLE_PK
    /**
	 * Class constructor
	 */
	public function __construct()
	{
		parent::__construct();
		 
	}
	
	function truncate()
	{
		$this->db->truncate($this->DB_TABLE);
	}

	// -----------------------------------------------------------------------
	/**
	 * Get all of the ACL records for a specific user
	 */
	public function acl_query( $user_id, $called_during_auth = FALSE )
	{
		// ACL table query
		$query = $this->db->select('b.action_id, b.action_code, c.category_code')
			->from( config_item('acl_table') . ' a' )
			->join( config_item('acl_actions_table') . ' b', 'a.action_id = b.action_id' )
			->join( config_item('acl_categories_table') . ' c', 'b.category_id = c.category_id' )
			->where( 'a.user_id', $user_id )
			->get();
		/**
		 * ACL becomes an array, even if there were no results.
		 * It is this change that indicates that the query was 
		 * actually performed.
		 */
		$acl = [];
		if( $query->num_rows() > 0 )
		{
			// Add each permission to the ACL array
			foreach( $query->result() as $row )
			{
				// Permission identified by category + "." + action code
				$acl[$row->action_id] = $row->category_code . '.' . $row->action_code;
			}
		}
		if( $called_during_auth OR $user_id == config_item('auth_user_id') )
			$this->acl = $acl;

		return $acl;
	}
	
	// -----------------------------------------------------------------------

	/**
	 * Check if ACL permits user to take action.
	 *
	 * @param  string  the concatenation of ACL category 
	 *                 and action codes, joined by a period.
	 * @return bool
	 */
	public function acl_permits( $str )
	{
		list( $category_code, $action_code ) = explode( '.', $str );

		// We must have a legit category and action to proceed
		if( strlen( $category_code ) < 1 OR strlen( $action_code ) < 1 )
			return FALSE;

		// Get ACL for this user if not already available
		if( is_null( $this->acl ) )
		{
			if( $this::ACL == $this->acl_query( config_item('auth_user_id') ) )
			{
				$this->load->vars( ['acl' => $this::ACL] );
				$this->config->set_item( 'acl', $this::ACL );
			}
		}
		if( 
			// If ACL gives permission for entire category
			in_array( $category_code . '.*', $this::ACL ) OR  
			in_array( $category_code . '.all', $this::ACL ) OR 

			// If ACL gives permission for specific action
			in_array( $category_code . '.' . $action_code, $this::ACL )
		)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	// -----------------------------------------------------------------------

	/**
	 * Check if the logged in user is a certain role or 
	 * in a comma delimited string of roles.
	 *
	 * @param  string  the role to check, or a comma delimited
	 *                 string of roles to check.
	 * @return bool
	 */
	public function is_role( $role = '' )
	{
		$auth_role = config_item('auth_role');

		if( $role != '' && ! empty( $auth_role ) )
		{
			$role_array = explode( ',', $role );

			if( in_array( $auth_role, $role_array ) )
			{
				return TRUE;
			}
		}
		return FALSE;
	}
	public function insert() 
	{
		$this->db->insert($this::DB_TABLE, $this);
		//return $this->db->affected_rows();
    }

    /**
	 * Update a record with data not from POST
	 *
	 * @param  int     the user ID to update
	 * @param  array   the data to update in the user table
	 * @return bool
	 */
	public function update() 
	{
        $this->db->where($this::DB_TABLE_PK, $this->{$this::DB_TABLE_PK});
        $this->db->update($this::DB_TABLE, $this);
    }

	//takes an array and sets them to variables in the class
    public function populate($rows) 
	{
    	$ret_val = [];
        foreach ($rows as $row) : $ret_val[$row->{$this::DB_TABLE_PK}] = $row;
        endforeach;
        return $ret_val; 
    }

    public function load($id) 
    {
        $query = $this->db->get_where($this::DB_TABLE, array($this::DB_TABLE_PK => $id));
        $this->populate($query->row_array());
    }

    public function save($status=TRUE) 
    {
        if (isset($status)): $this->update();
        else : $this->insert();
        endif;
    }


    public function get($whereset=NULL, $condition = NULL, $order = NULL, $limit = NULL, $offset = NULL) 
    //array($this::DB_TABLE_PK => $whereset)
    {
        if ($whereset):
            $query = $this->db->get_where($this::DB_TABLE, $condition, $limit, $offset)
            					->order_by($order, "ASC");
        elseif ($whereset===NULL&&$limit):
            $query = $this->db->get($this::DB_TABLE, $limit, $offset)->order_by($order, " ASC");
        else :
            $this->db->select('*');
			$this->db->from($this::DB_TABLE);
			$this->db->order_by($order, " ASC");
			$query = $this->db->get();
        endif;
        $rows = $query->custom_result_object(get_class($this));
        return $this->populate($rows);
    }

	// -----------------------------------------------------------------------
}

/* End of file MY_Model.php */
/* Location: ~/core/MY_Model.php */