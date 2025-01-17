@vite(['resources/sass/recipe_card_homepage.scss'])
<div 
  class="tab_panel-box" 
  data-panel="03"
>
<div class="row px-4 py-1">
    @forelse($mainDish as $post)
      <div class="col-4 p-2">
        <!-- recipe card -->
        <div class="card">
          <!-- recipe photo -->
          <a 
            href="{{ route('detailrecipe',
                  ['post_id'=>$post->id, 
                  'user_id'=>$post->user->id]) }}" 
          >
            @if($post->photo)
              <img 
                src="{{ $post->photo }}" 
                alt="{{ $post->title }}" 
                class="recipe_photo"
              >
            @else
              <img 
                src="{{ asset('/images/recipe_photos/weCook.png') }}" 
                alt="{{ $post->title }}" 
                class="recipe_photo"
              >
            @endif
          </a>
          <div class="card-body">
            <!-- recipe title -->
            <div class="row mt-2">
              <div class="col-8 pe-4">
                <a 
                  href="{{ route('detailrecipe',
                  ['post_id'=>$post->id, 
                  'user_id'=>$post->user->id]) }}"
                  class="text-decoration-none"
                >
                  <h4 class="card-title">
                    {{ $post->title }}
                  </h4>
                </a>
              </div>
              <!-- transit to the comment area -->
              <div class="col-auto px-0 d-none d-lg-block">
                <a href="{{ route('detailrecipe',
                  ['post_id'=>$post->id, 
                  'user_id'=>$post->user->id]) }}/#comment-start">
                  &#xf086; 
                  <span>
                    {{ $post->comment->count() }}
                  </span>
                </a>
              </div>
              <div class="col-1 d-none d-lg-block">
                @auth
                  @if($post->isBookmarked())
                    <a href="{{ route('bookmark.toggle', ['post_id' => $post->id]) }}">
                      <i class="fa-solid fa-bookmark"></i>
                    </a>
                  @else
                    <a href="{{ route('bookmark.toggle', ['post_id' => $post->id]) }}">
                      <i class="fa-regular fa-bookmark"></i>
                    </a>
                  @endif
                @endauth
              </div>
              <!-- responsive style (max-width: 912px) -->
              <div class="col-1 d-lg-none ms-auto me-3">
                <div class="dropdown">
                  <button 
                    class="btn
                    dropdown-toggle btn-lg" 
                    type="button" 
                    id="dropdownMenuButton" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                    style="color: #887569; border: none;"
                  >
                  </button>
                  <ul 
                    class="dropdown-menu" 
                    aria-labelledby="dropdownMenuButton"
                  >
                    <li  style="width: auto; margin-right: 1em; padding-right:0;">
                      <a 
                        class="dropdown-item tog-icon" 
                        href="{{ route('detailrecipe', ['post_id'=>$post->id, 'user_id'=>$post->user->id]) }}/#comment-start"
                      >
                        &#xf086; 
                        <span>{{ $post->comment->count() }}</span>
                      </a>
                    </li>
                    <li  style="width: auto; margin-right: 1em; padding-right: 0;">
                      @auth
                        @if($post->isBookmarked())
                          <a 
                            class="dropdown-item  tog-icon" 
                            href="{{ route('bookmark.toggle', ['post_id' => $post->id]) }}"
                          >
                            <i class="fa-solid fa-bookmark"></i>
                          </a>
                        @else
                          <a 
                            class="dropdown-item tog-icon" 
                            href="{{ route('bookmark.toggle', ['post_id' => $post->id]) }}"
                          >
                            <i class="fa-regular fa-bookmark"></i>
                          </a>
                        @endif
                      @endauth
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- recipe discription -->
            <p class="card-text pt-0">
              {{ $post->description }}
            </p>
          </div>
        </div>
      </div>
    @empty
      <div class="col-auto mx-auto">
        <p class="h2 sorry">Sorry! No Recipe Available.</p>
      </div>
    @endforelse
  </div>
  {{ $mainDish->links() }}
</div>