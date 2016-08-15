<link rel="apple-touch-icon" sizes="57x57" href="{{asset('favicon/apple-touch-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{asset('favicon/apple-touch-icon-60x60.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('favicon/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon/apple-touch-icon-76x76.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('favicon/apple-touch-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon/apple-touch-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{asset('favicon/apple-touch-icon-144x144.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('favicon/apple-touch-icon-152x152.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon-180x180.png')}}">
<link rel="icon" type="image/png" href="{{asset('favicon/favicon-32x32.png')}}" sizes="32x32">
<link rel="icon" type="image/png" href="{{asset('favicon/android-chrome-192x192.png')}}" sizes="192x192">
<link rel="icon" type="image/png" href="{{asset('favicon/favicon-96x96.png')}}" sizes="96x96">
<link rel="icon" type="image/png" href="{{asset('favicon/favicon-16x16.png')}}" sizes="16x16">
<link rel="manifest" href="{{asset('favicon/manifest.json')}}">
<link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="{{asset('favicon/mstile-144x144.png')}}">
<meta name="theme-color" content="#ffffff">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>{{$vc->getTitle()}}</title>

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Include global and theme specific assets -->
<link rel="stylesheet" href="{{asset('vendor/styles.global.min.css')}}">
<link rel="stylesheet" href="{{$vc->getThemeAsset('styles.min.css')}}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="{{asset('modules/theme/html5shiv.js')}}"></script>
<script src="{{asset('modules/theme/respond.js')}}"></script>
<![endif]-->
@stack('head-includes')

{{--
    Push additional items:

    @push('scripts')
        <script src="/example.js"></script>
    @endpush
--}}