@inject('md','Parsedown')
<h1>Recent Recipes</h1>
<div class="recipes">
@foreach($recipes as $recipe)
    <article class="recipe">
        <header><h1>{{$recipe->title}}</h1></header>
        {!! $md->text($recipe->steps) !!}
    </article>
@endforeach
</div>