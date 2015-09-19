Hi，{{ $username }}：
<br />
Seu {{ systemConfig('title','Enda Blog') }} comentário foi respondido！
<br />
<a href="{{ url(route('article.show',['id'=>$id])) }}#commentList">clique aqui para visualizar</a>