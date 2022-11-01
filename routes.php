<?php

$routes =
    [          //method      api_name              api_url              controller               action
        [       'POST',     'add_user',         '/users/add',       Controller\User::class,     'addUser'       ],
        [       'GET',      'get_users',        '/users/get',       Controller\User::class,     'getUsers'      ],
        [       'POST',     'delete_user',      '/users/delete',    Controller\User::class,     'deleteUser'    ],
        [       'POST',     'update_user',      '/users/update',    Controller\User::class,     'updateUser'    ],

        [       'POST',     'add_product',      '/products/add',    Controller\Product::class,  'addProduct'    ],
        [       'GET',      'get_products',     '/products/get',    Controller\Product::class,  'getProduct'    ],
        [       'POST',     'delete_product',   '/products/delete', Controller\Product::class,  'deleteProduct' ],
        [       'POST',     'update_product',   '/products/update', Controller\Product::class,  'updateProduct' ],

        [       'POST',     'add_order',        '/orders/add',      Controller\Order::class,    'addOrder'      ],
        [       'GET',      'get_orders',       '/orders/get',      Controller\Order::class,    'getOrder'      ],
        [       'POST',     'delete_order',     '/orders/delete',   Controller\Order::class,    'deleteOrder'   ],
        [       'POST',     'update_order',     '/orders/update',   Controller\Order::class,    'updateOrder'   ],
    ];

return $routes;