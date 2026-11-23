<li class="dropdown header-profile" style="height: 100%;display: flex;align-items: center;">
                    <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" style="
                    background: var(--rgba-primary-1);
                    border-color: var(--rgba-primary-1);
                    border-radius: 0.5rem;
                    border-width: 1px;
                    border-style: solid;
                ">
                        <img src="{{asset('images/profile/pic1.jpg')}}" class="img" width="20" alt=""/>
                        <div class="header-info ms-3">
                            <span class="font-w500 me-2">
                                مرحبا :
                                @isset(Auth::user()->name)
                                    {{Auth::user()->name}}
                                @endisset
                            </span>
                            <small class="text-end font-w400 me-2 text-muted">
                                {{-- @isset(auth()->user()->user->role) --}}
                                    {{-- @if(auth()->user()->user->role==1) --}}
                                        مدير
                                    {{-- @elseif(auth()->user()->user->role==2)
                                        محاسب
                                    @elseif(auth()->user()->user->role==3)
                                        عامل
                                    @endif
                                @endisset --}}
                            </small>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{route('resetPassword')}}" class="dropdown-item ai-icon">
                            <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="me-2">الملف الشخصي</span>
                        </a>
                        <a href="#" class="dropdown-item ai-icon">
                            <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <span class="me-2">الرسائل</span>
                        </a>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="me-2">تسجيل الخروج</span>
                            </button>
                        </form>
                    </div>
                </li>
