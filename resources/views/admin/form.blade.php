@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
        'name' => 'email',
        'label' => twillTrans('twill::lang.user-management.email')
    ])

    @formField('input', [
        'name' => 'new_password',
        'label' => 'Mot de passe',
        'type' => 'password'
    ])

    @can('manage-users')
        @formField('select', [
            'name' => "role",
            'label' => twillTrans('twill::lang.user-management.role'),
            'options' => $roleList,
            'placeholder' => twillTrans('twill::lang.user-management.role-placeholder'),
        ])
    @endcan

    @formField('select', [
        'name' => 'language',
        'label' => twillTrans('twill::lang.user-management.language'),
        'placeholder' => twillTrans('twill::lang.user-management.language-placeholder'),
        'default' => config('twill.locale', 'en'),
        'options' => array_map(function($locale) {
            return [
                'value' => $locale,
                'label' => getLanguageLabelFromLocaleCode($locale, true)
            ];
        }, config('twill.available_user_locales', ['en']))
    ])
@stop
