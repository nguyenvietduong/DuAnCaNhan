<?php
return [
    'module' => [
        [
            'title' => 'Admin',
            'icon' => 'fa fa-user-shield',
            'name' => ['feedback'],
            'route' => 'admin'
        ],
        [
            'title' => 'QL Khách Hàng',
            'icon' => 'fa fa-user',
            'name' => ['user'],
            'route' => 'admin/user/index',
        ],
        [
            'title' => 'QL Admin',
            'icon' => 'fa fa-address-card',
            'name' => ['editor', 'admin'],
            'subModule' => [
                [
                    'title' => 'Ql Biên Tập Viên',
                    'route' => 'admin/editor/index'
                ],
                [
                    'title' => 'QL Quản trị Viên',
                    'route' => 'admin/admin/index'
                ]
            ]
        ],
        [
            'title' => 'QL Danh Mục',
            'icon' => 'fa fa-blog',
            'name' => ['category'],
            'route' => 'admin/category/index'
        ],
        [
            'title' => 'QL Nhãn',
            'icon' => 'fa fa-tag',
            'name' => ['tag'],
            'route' => 'admin/tag/index'
        ],
        [
            'title' => 'QL Bài Viết',
            'icon' => 'fa fa-blog',
            'name' => ['article'],
            'route' => 'admin/article/index'
        ],
        [
            'title' => 'QL Bình Luận',
            'icon' => 'fa fa-comment',
            'name' => ['feedback'],
            'route' => 'admin/comment/index'
        ],
        [
            'title' => 'Cấu Hình Chung',
            'icon' => 'fa fa-file',
            'name' => ['system'],
            'subModule' => [
                [
                    'title' => 'Cấu Hình Hệ Thống',
                    'route' => 'admin/system/index'
                ],
            ]
        ]
    ],
];
