<?php

return [
    'role_structure' => [
        'super_admin' => [
            
			'categories' => 'c,r,u,d',
			'bus' => 'c,r,u,d',
			'musers' => 'c,r,u,d',
			'operations' => 'c,r,u,d',
			'types'=>'c,r,u,d',
			'status'=>'c,r,u,d',
			'users' => 'c,r,u,d',
        ],
		 'admin' => [
            
        ],
        
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
