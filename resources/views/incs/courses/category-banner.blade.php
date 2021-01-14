<div class="bd-title text-center">
    <div class="bd-tag-share">
        <div class="tag d-flex justify-content-around">
            @foreach ( \App\category::all() as $category)
            
            <a href="{{ route('courses.filter', $category->id) }}" class="primary-btn">
                {!! $category->icon !!}
                {{ $category->name }}
            </a>
            @endforeach
        </div>
    </div>
</div>