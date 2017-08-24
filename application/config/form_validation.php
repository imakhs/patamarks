<?php
$config = array(
	'assignment' => array(
            
            array(
                  'field' => 'lec_id',
                  'label' => 'lec_id',
                  'rules' => 'required'
            )
            ),
      'units' => array(
		array(
                  'field' => 'semester',
                  'label' => 'semester',
                  'rules' => 'required'
            ),
		array(
                  'field' => 'group_id',
                  'label' => 'group_id',
                  'rules' => 'required'
            ),
		array(
                  'field' => 'unit_id',
                  'label' => 'unit_id',
                  'rules' => 'required'
            ),
		array(
                  'field' => 'year',
                  'label' => 'year',
                  'rules' => 'required'
            ),
		array(
                  'field' => 'lec_id',
                  'label' => 'lec_id',
                  'rules' => 'required'
            )
		),
	'commission' => array(
		array(
                  'field' => 'col_name',
                  'label' => 'col_name',
                  'rules' => 'required'
			),
		array(
			'field' => 'dean',
                  'label' => 'dean',
                  'rules' => 'required'
			)
		),
	'course' => array(
		array(
                  'field' => 'name',
                  'label' => 'name',
                  'rules' => 'required'
                  )
		),
      'unit' => array(
            array(
                  'field' => 'abbr',
                  'label' => 'abbr',
                  'rules' => 'required'
                  )
            ),
      'grade' => array(
            array(
                  'field' => 'abbr',
                  'label' => 'abbr',
                  'rules' => 'required'
                  )
            ),
      'result' => array(
            array(
                  'field' => 'stud_id',
                  'label' => 'stud_id',
                  'rules' => 'required'
                  ),
            array(
                  'field' => 'marks',
                  'label' => 'marks',
                  'rules' => 'required'
                  ),
            array(
                  'field' => 'examination_id',
                  'label' => 'examination_id',
                  'rules' => 'required'
                  )
            ),
      'type' => array(
            array(
                  'field' => 'abbr',
                  'label' => 'abbr',
                  'rules' => 'required'
                  ),
            array(
                  'field' => 'abbr',
                  'label' => 'abbr',
                  'rules' => 'required'
                  ),
            array(
                  'field' => 'abbr',
                  'label' => 'abbr',
                  'rules' => 'required'
                  )
            ),
      'exam' => array(
            array(
                  'field' => 'exam_type',
                  'label' => 'exam_type',
                  'rules' => 'required'
                  ),
            array(
                  'field' => 'unit_id',
                  'label' => 'unit_id',
                  'rules' => 'required'
                  ),
            array(
                  'field' => 'max_marks',
                  'label' => 'max_marks',
                  'rules' => 'required'
                  ),
            array(
                  'field' => 'date',
                  'label' => 'date',
                  'rules' => 'required'
                  )
            ),
      'lecturer'=>array(
            array(
                  'field' => 'username',
                  'label' => 'username',
                  'rules' => 'max_length[12]|is_unique[' . config_item('user_table') . '.username]',
                  'errors' => ['is_unique' => 'Username already in use.']
                  ),
            array(
                  'field' => 'passwd',
                  'label' => 'passwd',
                  'rules' => 'trim|required',
                  'errors' => ['required' => 'The password field is required.']
                  ),
            array(
                  'field'  => 'email',
                  'label'  => 'email',
                  'rules'  => 'trim|required|valid_email|is_unique[' . config_item('user_table') . '.email]',
                  'errors' => [
                        'is_unique' => 'Email address already in use.'
                  ]),
            array(
                  'field' => 'auth_level',
                  'label' => 'auth_level',
                  'rules' => 'required|integer|in_list[1,6,9]'))
	);