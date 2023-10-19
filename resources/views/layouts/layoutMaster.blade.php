@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
    $loginPage = isset($loginPage) ? $loginPage : false;
    $configData = Helper::appClasses();
@endphp

@if ($loginPage)
    @include('layouts.blankLayout')
@else
    @isset($configData['layout'])
        @include(
            $configData['layout'] === 'horizontal'
                ? 'layouts.horizontalLayout'
                : ($configData['layout'] === 'blank'
                    ? 'layouts.blankLayout'
                    : ($configData['layout'] === 'front'
                        ? 'layouts.layoutFront'
                        : 'layouts.contentNavbarLayout')))
    @endisset
@endif
