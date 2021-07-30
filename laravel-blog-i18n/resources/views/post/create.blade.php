<div class="content">
    <div class="links">
        <a href="{!! route('home') !!} "> {!! __('language.home') !!}</a>
        <a href="{{route('posts.list')}}">{!! __('language.list_post') !!}</a>
    </div>
    <form action="{{route('posts.store')}}" method="post" class="form-create-post">
        {{csrf_field()}}
        <label for="title">{!! __('language.title') !!}</label> <br/>
        <input id="title" name="title" type="text"/> <br/>
        <label for="content">{!! __('language.content') !!}</label> <br/>
        <textarea id="content" name="content"></textarea><br/>
        <button type="submit" value="Create">{!! __('language.save') !!}</button>
    </form>
</div>