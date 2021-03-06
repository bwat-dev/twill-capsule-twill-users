@formField('input', [
'name' => 'name',
'label' => twillTrans('twill::lang.user-management.name')
])

@unless($item ?? null)
    @formField('input', [
        'name' => 'email',
        'label' => twillTrans('twill::lang.user-management.email')
    ])

    @formField('input', [
        'name' => 'password',
        'label' => 'Mot de passe',
        'type' => 'password'
    ])
    @can('manage-users')
        @formField('select', [
        'name' => "role",
        'label' => twillTrans('twill::lang.user-management.role'),
        'native' => true,
        'options' => $roleList,
        'placeholder' => 'Select a role'
        ])
    @endcan
@endunless
