<div class="container-fluid my-5 px-0">
    <div class="video wow fadeInUp"
    data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <button type="button" class="btn-play" data-bs-toggle="modal" data-bs-target="#videoModal">
            <span></span>
        </button>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">فيديو اخراج السفينة مبارك</h5> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                              <video width="320" height="240" controls>
                                <source src="{{asset('/videos/teach.mp4')}}" type="video/mp4">
                              </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <h1 class="text-white mb-4">فيديو اخراج السفينة مبارك</h1> --}}
        {{-- <h3 class="text-white mb-0">24 Hours 7 Days a Week</h3> --}}
    </div>

</div>
