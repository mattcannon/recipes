@inject('md','Parsedown')
<h1>Recent Recipes</h1>
@if(count($recipes) > 0)
    <div class="recipes">
        @foreach($recipes as $recipe)
            <article class="recipe">
                <header><h1>{{$recipe->title}}</h1></header>
                {!! $md->text($recipe->abstract) !!}
                <footer>
                    <a href="{{route('recipe.show',[$recipe])}}">Read More</a>
                </footer>
            </article>
        @endforeach
    </div>
@else
    <p>No recent recipes</p>
@endif