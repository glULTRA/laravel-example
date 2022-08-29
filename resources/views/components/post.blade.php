@props(['post' => $post])

<a href="{{ route('users.posts', $post->user) }}" class="font-bold text-lime-200">{{ $post->user->name }}</a>
<span class="mb-2"> {{ $post->created_at->diffForHumans() }}</span>
<div class="mt-4 mb-4 grid-flow-col grid-rows-1 grid-cols-2 grid"> 
    <div class="row-span-6 col-span-full ">
        {{ $post->body }}
    </div>
    <div class="">
    @can('delete', $post)
            <button onclick="toggleModal('modal-{{$post->id}}')"
                class="inline-block p-3 text-center text-white transition bg-main-600 rounded-full shadow ripple hover:shadow-lg hover:bg-main-400 focus:outline-none">
                <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path
                    fill-rule="evenodd"
                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                    clip-rule="evenodd"
                />
            </svg>
            </button>
              <div class="hidden py-56 overflow-x-hidden backdrop-blur-sm overflow-y-auto font-mono fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-{{$post->id}}">
                <div class="relative w-auto my-6 mx-auto max-w-3xl ">
                  <!--content-->
                  <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-main-50 outline-none focus:outline-none">
                    <!--header-->
                    <div class="flex items-start justify-between p-5 border-b border-solid bg-main-400 border-slate-200 rounded-t">
                      <h3 class="text-3xl font-semibold text-gray-800 justify-center">
                        Delete post?
                      </h3>
                      <button class="p-1 ml-auto border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-{{$post->id}}')">
                        <span class="text-black h-6 w-6 text-2xl block outline-none focus:outline-none">
                          ×
                        </span>
                      </button>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                      <h1 class="my-4 text-slate-500 text-lg font-bold font-mono leading-relaxed">
                        Hello {{ $post->user->username }} 
                      </h1>
                      <p class="my-4 text-slate-500 text-lg leading-relaxed font-mono">
                       do you wanna delete "{{ $post->body }}"
                        that is one of your posts?
                      </p>
                    </div>
                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                      <button class="text-main-800 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-{{$post->id}}')">
                        No
                      </button>
                      <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('delete')  
                        <button class="bg-error-500 text-white active:bg-error-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit" onclick="toggleModal('modal-{{$post->id}}')">
                            Delete post!
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
              <script type="text/javascript">
                function toggleModal(modalID){
                  document.getElementById(modalID).classList.toggle("hidden");
                  document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                  document.getElementById(modalID).classList.toggle("flex");
                  document.getElementById(modalID + "-backdrop").classList.toggle("flex");
                }
            </script>
        @endcan
    </div>
</div>
