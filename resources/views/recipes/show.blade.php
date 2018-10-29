@inject('md', '\Parsedown')
<article>
    <header><h1>{{$recipe->title}}</h1></header>
    {!!  $md->text($recipe->abstract) !!}
    {!!  $md->text($recipe->steps) !!}
</article>