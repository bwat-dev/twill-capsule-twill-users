<?php

namespace App\Twill\Capsules\TwillUsers\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Model;

class TwillUser extends Model
{
    use HasMedias, HasFiles;

    protected $fillable = [
        'email',
        'name',
        'role',
        'published',
        'title',
        'description',
        'google_2fa_enabled',
        'google_2fa_secret',
        'language',
        'password'
    ];
    public $mediasParams = [
        'cover' => [
            'default' => [
                [
                    'name' => 'default',
                    'ratio' => 16 / 9,
                ],
            ],
            'mobile' => [
                [
                    'name' => 'mobile',
                    'ratio' => 1,
                ],
            ],
            'flexible' => [
                [
                    'name' => 'free',
                    'ratio' => 0,
                ],
                [
                    'name' => 'landscape',
                    'ratio' => 16 / 9,
                ],
                [
                    'name' => 'portrait',
                    'ratio' => 3 / 5,
                ],
            ],
        ],
    ];
}
