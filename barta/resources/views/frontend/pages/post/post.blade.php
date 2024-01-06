

@php
if(isset($_GET['username'])){
    $search = $_GET['username'];
    $posts = App\Models\User::where('name', 'LIKE', "%".$search."%")->orwhere('username', 'LIKE', "%"."$search"."%")->get();
}
@endphp

@foreach ($posts as $post)
<article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
    <!-- Barta Card Top -->
    <header>
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <!-- User Info -->
          <div class="text-gray-900 flex flex-col min-w-0 flex-1">
            @isset($post->user->id)
            <a href="{{ route('my.profile', $post->user->id) }}" class="hover:underline font-semibold line-clamp-1">
                {{ $post->user->name }}
            </a>
            @endisset
            <a href="profile.html" class="hover:underline text-sm text-gray-500 line-clamp-1">
              {{ '@'.$post->user->username }}
            </a>
          </div>
          <!-- /User Info -->
        </div>

        <!-- Card Action Dropdown -->
        @if (auth()->user()->id === $post->user->id)
        <div class="flex flex-shrink-0 self-center" x-data="{ open: false }">
            <div class="relative inline-block text-left">
              <div>
                <button @click="open = !open" type="button" class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600" id="menu-0-button">
                  <span class="sr-only">Open options</span>
                  <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"></path>
                  </svg>
                </button>
              </div>
              <!-- Dropdown menu -->
              <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" style="display: none;">
                <a href="{{ route('posts.edit',$post->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="post-edit">Edit</a>

                <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="post-edit"> <button type="submit">Delete</button></a>
                </form>

              </div>
            </div>

          </div>
        @endif
        <!-- /Card Action Dropdown -->
      </div>
    </header>

    <!-- Content -->
    <div class="py-4 text-gray-700 font-normal">
      <p>{!! Str::words($post->description, '40', '...') !!}
        <a href="{{ route('single.post',$post->id) }}">..Read More</a>
      </p>
      @if ($post->image)
      <br>
      <img class="w-100 h-auto" src="{{ asset('storage/'.$post->image) }}" alt="">
      @endif
    </div>
    <!-- Date Created & View Stat -->
    <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
      <span class="">{{ $post -> created_at -> diffForHumans() }}</span>
      <span class="">{{ $post->count_view }} views</span>
    </div>
    <a href="{{ route('posts.comments.index',$post->id) }}" type="button" class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800">
        <span class="sr-only">Comment</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z"></path>
        </svg>
            <p>{{ $post->comments_count }}</p>
    </a>
</article>
@endforeach
