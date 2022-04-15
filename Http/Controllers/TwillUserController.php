<?php

namespace App\Twill\Capsules\TwillUsers\Http\Controllers;


use A17\Twill\Http\Controllers\Admin\ModuleController;
use A17\Twill\Models\Enums\UserRole;
use Illuminate\Support\Collection;

class TwillUserController extends ModuleController
{
    protected $moduleName = 'twillUsers';

    /**
     * @var string[]
     */
    protected $indexWith = ['medias'];

    /**
     * @var array
     */
    protected $defaultOrders = ['name' => 'asc'];

    /**
     * @var array
     */
    protected $defaultFilters = [
        'search' => 'search',
    ];

    /**
     * @var array
     */
    protected $filters = [
        'role' => 'role',
    ];

    /**
     * @var string
     */
    protected $titleColumnKey = 'name';

    /**
     * @var array
     */
    protected $indexColumns = [
        'name' => [
            'title' => 'Name',
            'field' => 'name',
        ],
        'email' => [
            'title' => 'Email',
            'field' => 'email',
            'sort' => true,
        ],
        'role_value' => [
            'title' => 'Role',
            'field' => 'role_value',
            'sort' => true,
            'sortKey' => 'role',
        ],
    ];

    protected function indexData($request)
    {
        return [
            'defaultFilterSlug' => 'published',
            'roleList' => Collection::make(UserRole::toArray()),
            'single_primary_nav' => [
                'users' => [
                    'title' => twillTrans('twill::lang.user-management.users'),
                    'module' => true,
                ],
            ],
            'customPublishedLabel' => twillTrans('twill::lang.user-management.enabled'),
            'customDraftLabel' => twillTrans('twill::lang.user-management.disabled'),
        ];
    }

    protected function formData($request)
    {
        return [
            'roleList' => Collection::make(UserRole::toArray())
        ];
    }

}
