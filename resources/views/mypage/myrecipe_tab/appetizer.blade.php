@vite(['resources/sass/myrecipe_tab.scss'])
<div class="tab-content">
    <div class="d-flex container" style="border: solid orange;">
        <div class="grid" style="border: solid yellow;">
            @forelse($appetizer_posts as $post)
            <div class="grid-item" style="border: solid grey;">
                <div id="photo1" class="tab-pane active image-container" style="border: solid black;">
                    <div class="card" style="border: solid blue;"> 
                        <!-- mb-3 -->
                        <div class="card-itself container-fluid">
                            <div class="myrecipe-header d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="card-title fw-bold">{{ $post->title }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('editmyrecipe') }}">
                                        <i class="edit-icon fa-solid fa-pen" href=""></i>
                                    </a>
                                </div>                                                        
                            </div>
                            <div class="image-container">
                                <img src="{{ asset('../images/appetizer/appetizer1.jpg') }}" alt="Tomato Rice" class=""/>
                            </div>
                            <div class="myrecipe-footer d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="comment-icon fa-regular fa-comments"></i>
                                    <span class="comment-text fw-bold">{{ $post->comments->count() }}</span>
                                </div>
                                <div>
                                    <i class="bookmark-icon fa-regular fa-bookmark"></i>
                                    <span class="bookmark-text fw-bold">{{ $post->bookmark()->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-auto mx-auto">
                <p class="h2 sorry">Sorry! No Recipe Available.</h3>
            </div>
            @endforelse
        </div>
    </div>
</div>