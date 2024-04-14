<!-- /resources/views/components/alert.blade.php -->

<span class="alert-title">{{ $title }}</span>


<div {{$attributes->merge(['class' => 'alert alert-'.$type])}}>
    {{ $slot }}
</div>

<span class="alert-title">{{ $footer }}</span>

