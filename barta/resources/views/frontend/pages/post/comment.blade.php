@extends('layouts.app')
@section('main-content')
<section id="newsfeed" class="space-y-6">
    <!-- Barta Card -->
@foreach ($posts as $post)

<article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
      <!-- Barta Card Top -->
      <header>
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-3">
            <!-- User Info -->
            <div class="text-gray-900 flex flex-col min-w-0 flex-1">
              <a href="{{ route('my.profile',$post->id) }}" class="hover:underline font-semibold line-clamp-1">
                {{ $post->user->name }}
              </a>

              <a href="{{ route('my.profile',$post->id) }}" class="hover:underline text-sm text-gray-500 line-clamp-1">
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
                <a href="{{ route('posts.edit',$post->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Edit</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-1">Delete</a>
              </div>
            </div>
          </div>
          @endif
          <!-- /Card Action Dropdown -->
        </div>
      </header>

      <!-- Content -->
      <div class="py-4 text-gray-700 font-normal">
        <p>
            {{ $post->description }}
        </p>
      </div>

      <!-- Date Created & View Stat -->
      <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
        <span class="">{{ $post->created_at->diffForhumans() }}</span>
        <span class="">•</span>
        <span>{{ $post->comments_count }} comments</span>
        <span class="">•</span>
        <span>450 views</span>
      </div>

      <hr class="my-6">

      <!-- Barta Create Comment Form -->
      <form action="{{ route('posts.comments.store',$post) }}" method="POST">
        @csrf
        <!-- Create Comment Card Top -->
        <div>
          <div class="flex items-start /space-x-3/">
            <!-- User Avatar -->
            <!-- <div class="flex-shrink-0">-->
            <!--              <img-->
            <!--                class="h-10 w-10 rounded-full object-cover"-->
            <!--                src="https://avatars.githubusercontent.com/u/831997"-->
            <!--                alt="Ahmed Shamim" />-->
            <!--            </div> -->
            <!-- /User Avatar -->

            <!-- Auto Resizing Comment Box -->
            <div class="text-gray-700 font-normal w-full">
                <textarea x-data="{
                    resize () {
                        $el.style.height = '0px';
                        $el.style.height = $el.scrollHeight + 'px'
                    }
                }" x-init="resize()" @input="resize()" type="text" name="body" placeholder="Write a comment..." class="flex w-full h-auto min-h-[40px] px-3 py-2 text-sm bg-gray-100 focus:bg-white border border-sm rounded-lg border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-1 focus:ring-offset-0 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50 text-gray-900" style="height: 38px;"></textarea>
            </div>
          </div>
        </div>

        <!-- Create Comment Card Bottom -->
        <div>
          <!-- Card Bottom Action Buttons -->
          <div class="flex items-center justify-end">
            <button type="submit" class="mt-2 flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
              Comment
            </button>
          </div>
          <!-- /Card Bottom Action Buttons -->
        </div>
        <!-- /Create Comment Card Bottom -->
      </form>
      <!-- /Barta Create Comment Form -->
</article>
    <!-- /Barta Card -->

    <hr>
    <div class="flex flex-col space-y-6">
      <h1 class="text-lg font-semibold">Comments ({{ $post->comments_count }})</h1>

      <!-- Barta User Comments Container -->
      <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-2 sm:px-6 min-w-full divide-y">
    @forelse ($post->comments as $commentUser)
    <div class="py-4">
        <!-- Barta User Comments Top -->
        <header>
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
              <!-- User Info -->
                <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                    <a href="{{ route('my.profile',$commentUser->user->id) }}" class="hover:underline font-semibold line-clamp-1">
                      {{ $commentUser->user->name }}
                    </a>

                    <a href="profile.html" class="hover:underline text-sm text-gray-500 line-clamp-1">
                      {{ '@'.$commentUser->user->username }}
                    </a>
                  </div>
              <!-- /User Info -->
            </div>

            <!-- Card Action Dropdown -->
        @if (auth()->user()->id === $commentUser->user->id)
        <div class="flex flex-shrink-0 self-center" x-data="{ open: false }">
            <div class="relative inline-block text-left">
            <div>
                <button @click="open = !open" type="button" class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600" id="menu-0-button">
                <span class="sr-only">Open Options</span>
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"></path>
                </svg>
                </button>
            </div>
            <!-- Dropdown menu -->
            <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" style="display: none;">
                <a href="{{ route('posts.comments.edit',['post' => $post->id, 'comment' => $commentUser->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Edit</a>
                <form action="{{ route('posts.comments.destroy',['post' => $post->id, 'comment' => $commentUser->id]) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-1"><button type="submit">Delete</button></a>
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
            <p>{{ $commentUser->body }}</p>
        </div>
        <!-- Date Created -->
        <div class="flex items-center gap-2 text-gray-500 text-xs">
          <span class="">{{ $commentUser->created_at->diffForhumans() }}</span>
        </div>
      </div>
    @empty
    <p>No Comment</p>
    @endforelse
    </article>
    <!--/Barta User Comments-->
</div>
@endforeach
</section>


{{-- <div x-data="{ modalOpen: false }"
    @keydown.escape.window="modalOpen = false"
    class="relative z-50 w-auto h-auto">
    <button @click="modalOpen=true" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors bg-white border rounded-md hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">Open</button>
    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
            <div x-show="modalOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
            <div x-show="modalOpen"
                x-trap.inert.noscroll="modalOpen"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-lg font-semibold">Modal Title</h3>
                    <button @click="modalOpen=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
                <div class="relative w-auto">
                    <p>This is placeholder text. Replace it with your own content.</p>
                </div>
            </div>
        </div>
    </template>
</div> --}}

@endsection
