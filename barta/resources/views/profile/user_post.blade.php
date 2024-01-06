
@foreach ($posts as $post)
<article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
    <!-- Barta Card Top -->
    <header>
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <!-- User Info -->
          <div class="text-gray-900 flex flex-col min-w-0 flex-1">
            <a href="profile.html" class="hover:underline font-semibold line-clamp-1">
              Ahmed Shamim Hasan Shaon
            </a>

            <a href="profile.html" class="hover:underline text-sm text-gray-500 line-clamp-1">
              @me_shaon
            </a>
          </div>
          <!-- /User Info -->
        </div>

        <!-- Card Action Dropdown -->
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
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Edit</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Delete</a>
            </div>
          </div>
        </div>
        <!-- /Card Action Dropdown -->
      </div>
    </header>

    <!-- Content -->
    <div class="py-4 text-gray-700 font-normal">
      <p>
        {{ $post->description }}
      </p>
      @if ($post->image)
      <br>
      <img class="w-100 h-auto" src="{{ asset('storage/'.$post->image) }}" alt="">
      @endif
    </div>

    <!-- Date Created & View Stat -->
    <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
      <span class="">{{ $post->created_at->diffForhumans() }}</span>
      <span class="">•</span>
      <span>@foreach( $users as $comment ) {{ $comment->comments_count }} @endforeach Comments</span>
      <span class="">•</span>
      <span>450 views</span>
    </div>

    <hr class="my-6">

    <!-- Barta Create Comment Form -->
    @include('frontend.pages.post.comment_from')
    <!-- /Barta Create Comment Form -->
    <!-- /Barta Card Bottom -->
  </article>
  @endforeach
