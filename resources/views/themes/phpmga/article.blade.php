@extends('themes.phpmga.main')

@section('header')
    <title>{{ $article->title }} - {{ systemConfig('title','PHP-Mga Blog') }}</title>
    <meta name="keywords" content="{{ $article->title }},{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{!! str_limit(preg_replace('/\s/', '',strip_tags(conversionMarkdown($article->content))),100) !!}">
@endsection

@section('content')

        <section id="hero" class="light-typo">
            <div id="cover-image" class="image-bg animated fadeIn"></div>
            <div class="container welcome-content">
                <div class="middle-text">
                    <h1>{{ $article->title }}</h1>
                </div>
            </div>
        </section>

        <section id="breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <ol class="breadcrumb">
                            <li><a href="{{ route('article.index') }}" title="{{ systemConfig('title','Enda Blog') }}">Home</a></li>
                            <li><a href="{{ url(route('category.show',['id'=>$article->category->as_name])) }}" title="{{ $article->category->cate_name }}" >{{ $article->category->cate_name }}</a></li>
                            <li class="active">{{ $article->title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <div class="container content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="post-date">
                        {{ date('Y-m-d',strtotime($article->created_at)) }} |
                        <a href="{{ url(route('about.show',['id'=>$article->user->id])) }}" title="{{ $article->user->name }}" >{{ $article->user->name }} </a>
                        <span>
                            <a href="#disqus_thread" title="{{ $article->title }}">0 comentários</a>
                        </span>
                    </div>

                     <?php  $contentHtml = conversionMarkdown($article->content) ?>
                    <div id="contentHtml">
                        {!! $contentHtml !!}
                    </div>


                    <div class="post-date">
                        tags |
                        @if(!empty($tags))
                            @foreach($tags as $key=>$tag)
                                <a href="{{ url('search/tag',['id'=>$tag->id]) }}" title="{{ $tag->name }}" >{{ $tag->name }}</a>@if(count($tags) != $key+1) , @endif
                            @endforeach
                        @endif
                    </div>


                    <ul class="social-links outline text-center">
                        
                    </ul>

                    <div id="author" class="clearfix">
                        <img class="img-circle" src="{{ asset('uploads'.'/'.$article->user->photo) }}" height="96" width="96" alt="{{ $article->user->name }}" title="{{ $article->user->name }}">
                        <div class="author-info">
                            <h3>{{ $article->user->name }}</h3>
                            <p>
                                {!! strip_tags(conversionMarkdown($article->user->desc)) !!}
                            </p>
                        </div>
                    </div>


                    <div class="post-popular">
                        <div class="row hidden-xs">
                            @if(!empty($authorArticle))

                                @foreach($authorArticle as $articleModel)

                            <div class="col-sm-4 col-md-4">
                                <a href="{{ route('article.show',array('id'=>$articleModel->id)) }}" title="{{ $articleModel->title }}" >
                                    <img src="{{ getArticleImg($articleModel->pic) }}" class="img-responsive" alt="{{ $articleModel->title }}" title="{{ $articleModel->title }}" style="height: 200px;"></a>
                                <h4 class="text-center">
                                    <a href="{{ route('article.show',array('id'=>$articleModel->id)) }}" title="{{ $articleModel->title }}" >
                                        {{ $articleModel->title }}
                                    </a>
                                </h4>
                                <p class="post-date text-center">
                                    {{ date('Y-m-d',strtotime($articleModel->created_at)) }}
                                </p>
                            </div>

                                @endforeach
                            @endif
                        </div>

                    </div>

                   <div id="disqus_thread"></div>
					<script type="text/javascript">
					    /* * * CONFIGURATION VARIABLES * * */
					    var disqus_shortname = 'phpmgablog';
					    
					    /* * * DON'T EDIT BELOW THIS LINE * * */
					    (function() {
					        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					    })();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comentários powered by Disqus.</a></noscript>
                </div>
            </div>
        </div>
<script>
    function re_captcha() {
        $url = "{{ URL('public/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('verifyCode').src=$url;
    }

    function updateParentId(parentId,username){
        $('#content').attr('placeholder','@'+username);
        $('#parent_id').val(parentId);
    }

</script>
@endsection