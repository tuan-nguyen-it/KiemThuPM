<?php
    return [
        [
            'label' => 'Dashboard',
            'route' => 'admin.dashboard',
            'icon' => 'fa-home'
        ],
        [
            'label' => 'Product Manager',
            'route' => 'product.index',
            'icon' => 'fa-box',
            'items' => [
                [
                    'label' => 'All product',
                    'route' => 'product.index'
                ],
                [
                    'label' => 'Add product',
                    'route' => 'product.create'
                ]
            ] 
                ],
        [
            'label' => 'Category Manager',
            'route' => 'category.index',
            'icon' => 'fa-list',
            'items' => [
                [
                    'label' => 'All category',
                    'route' => 'category.index'
                ],
                [
                    'label' => 'Add category',
                    'route' => 'category.create'
                ]
            ] 
                ],
          [
            'label' => 'Blog Manager',
            'route' => 'blog.index',
            'icon' => 'fa-folder-open',
            'items' => [
                [
                    'label' => 'All blog',
                    'route' => 'blog.index'
                ],
                [
                    'label' => 'Add category',
                    'route' => 'blog.create'
                ]
            ] 
                ], 
            [
                'label' => 'Banner Manager',
                'route' => 'banner.index',
                'icon' => 'fa-image',
                'items' => [
                    [
                        'label' => 'All banner',
                        'route' => 'banner.index'
                    ],
                    [
                        'label' => 'Add banner',
                        'route' => 'banner.create'
                    ]
                ] 
                    ], 
            [
                'label' => 'Order Manager',
                'route' => 'order.index',
                'icon' => 'fa-shopping-cart',
                'items' => [
                    [
                        'label' => 'All order',
                        'route' => 'order.index'
                    ],
                    [
                        'label' => 'Statistic Order',
                        'route' => 'order.create'
                    ],
                ] 
                    ], 
            [
                'label' => 'Account Manager',
                'route' => 'account.index',
                'icon' => 'fa-user',
                'items' => [
                    [
                        'label' => 'All account',
                        'route' => 'account.index'
                    ],
                    [
                        'label' => 'Add account',
                        'route' => 'account.create'
                    ]
                ] 
            ], 
            [
                'label' => 'Detail Manager',
                'route' => 'order_detail.index',
                'icon' => 'fa-shopping-cart',
                'items' => [
                    [
                        'label' => 'All account',
                        'route' => 'order_detail.index'
                    ],
                    [
                        'label' => 'Add account',
                        'route' => 'order_detail.create'
                    ]
                ] 
            ], 
            [
                'label' => 'Logout',
                'route' => 'logout',
                'icon' => 'fa-user',
            ]  
    ]

?>