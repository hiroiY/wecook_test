<div 
  class="tab_panel-box is-show" 
  data-panel="01"
>
  <div class="tab_panel-text">
    @if(Auth::user())
    <form 
      action="{{ route('store.comment',$recipe->id) }}" 
      method="post" 
      class="px-5 d-flex my-5"
    >
      @csrf 
      <input 
        type="text" 
        name="comment" 
        id="comment" 
        class="w-100 p-1" 
        placeholder="Comments here"
      >
      <button 
        type="submit" 
        class="ms-1 p-1 border-0 rounded add" 
      >
        Add Comment
      </button>
    </form>
    @else
      <h3 
        class="text-center my-5"
      >
        Adding Comment is for auth users only, <a href="{{ route('register') }}"">Register</a> or <a href="{{ route('login') }}"">Login</a>
      </h3>
    @endif

    <!-- comment area below-->
    @forelse($all_comments as $comment)
      <!-- If the user is comment's owner -->
      @if(Auth::user()->id === $comment->user_id )
        <div class="p-3 mb-3 mx-3 comments-owner ">
          <div class="row user_account w-100 ms-0 mb-2 justify-content-between">
            <div class="col-3 d-inline-flex ms-0 ps-0"> 
              @if(Auth::user()->avatar)
                <img src="{{ asset('images\profile_icon.png') }}" alt="">
              @else
                <img 
                  src="{{ asset('images\profile_icon.png') }}" 
                  alt="{{ $comment->user->name }}"
                >
              @endif
              <p class="username my-auto p-1">{{ Auth::user()->name }}</p>
              &nbsp;
              <span 
                class="text-uppercase small text-center my-auto" 
                style="color: #4D1F0191;"
              >
                {{ date('M d, Y', strtotime($comment->created_at)) }}
              </span>
            </div>
            <div class="col-2 my-auto pe-0">
              <button type="button" class="ms-4 px-3 small">Edit</button>
              <button type="submit" class="px-3 ms-2 me-0 small mt-2">Delete</button>
            </div>
            <p class="mb-0">{{ $comment->body}}</p>
          </div>
        </div>
      @else

        <!-- Another user's comment -->
        <div class="p-3 mb-3 mx-3 comments">
          <div class="user_account d-inline-flex mb-1"> 
            @if($comment->user->avatar) 
              <img 
                src="{{$comment->user()->avatar}}" 
                alt="{{$comment->user->name}}"
              >
              <p class="username my-auto p-1">
                {{$comment->user->name}}
              </p>
            @else
              <img 
                src="{{ asset('images\profile_icon.png') }}" 
                alt="{{ $comment->user->name }}"
              >
              <p class="username my-auto p-1">
                {{$comment->user->name}}
              </p>
            @endif
            &nbsp;
            <span 
              class="text-uppercase small text-center my-auto" 
              style="color: #4D1F0191;"
            >
              {{ date('M d, Y', strtotime($comment->created_at)) }}
            </span>
          </div>
          <p class="mb-0">
            {{ $comment->body }}
          </p>
        </div>
      @endif
    @empty
    <div class="col-auto text-center">
      <p class="h2 sorry">Let's add your commnet!</p>
    </div>
    @endforelse
  </div>
  {{ $all_comments->links() }}
</div>