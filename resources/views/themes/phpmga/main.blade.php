<!doctype html>
<html>
<head>
    @yield('header')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{ homeAsset('/css/googleCss.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ homeAsset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/icons.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/font.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/animate.min.css') }}">
    <link rel="shortcut icon" href="{{ homeAsset('/img/ico/32.png') }}" sizes="32x32" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" href="{{ homeAsset('/img/ico/60.png" type="image/png') }}"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ homeAsset('/img/ico/72.png') }}" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ homeAsset('/img/ico/120.png') }}" type="image/png"/>
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ homeAsset('/img/ico/152.png') }}" type="image/png"/>
    <script type="text/javascript" src="{{ homeAsset('/js/jquery-1.9.1.min.js') }}"></script>
    <!--[if lt IE 9]>
    <script src="{{ homeAsset('/js/html5shiv.js') }}"></script>
    <script src="{{ homeAsset('/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body id="home">

@include('themes.keylime.menu')
<div id="wrap">
    <div id="main-nav" class="">
        <div class="container">
            <div class="nav-header">
                <a class="nav-brand" href="{{ url('/') }}">PHP-Mga Blog</a>
                <a class="menu-link nav-icon" href="#"><i class="icon-menu2"></i></a>
            </div>
        </div>
    </div>
@yield('content')

<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                    <div class="col-sm-4 col-md-4 footer-widget">
                    <h3>Postagens recentes</h3>
                    <div class="post-recent-widget">
                        <div class="row">
                            <div class="col-sm-12">

                                @if(!empty($recentArticle))
                                    @foreach($recentArticle as $article)
                                        <div class="media">
                                            <a class="pull-left" href="{{ url(route('article.show',['id'=>$article->id])) }}" title="{{ $article->title }}" >
                                                <img class="media-object" src="{{ getArticleImg($article->pic) }}" width="80" alt="{{ $article->title }}" title="{{ $article->title }}"></a>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="{{ url(route('article.show',['id'=>$article->id])) }}" title="{{ $article->title }}" >{{ $article->title }}</a>
                                                </h4>
                                                <p class="post-date">{{ date('Y-m-d',strtotime($article->created_at)) }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 footer-widget clearfix">
                    <h3>Tags</h3>
                    <ul class="tags">
                        @if(!empty($hotTags))
                            @foreach($hotTags as $tag)
                                <li>
                                    <a href="{{ url('search/tag',['id'=>$tag->id]) }}"  title="{{ $tag->name }}">{{ $tag->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">   
            <ul class="social-links pull-right">
                <li><a target="_blank" href="https://github.com/phpmga"><i class="icon-twitter"></i></a></li>
           </ul>
        </div>
    </div>
</footer>
</div>


<script type="text/javascript" src="{{ homeAsset('/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ homeAsset('/js/placeholders.min.js') }}"></script>
<script type="text/javascript" src="{{ homeAsset('/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ homeAsset('/js/custom.js') }}"></script>
</body>
</html>