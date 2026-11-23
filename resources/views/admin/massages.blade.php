   <div  style="display: none;">
                @if (session()->has('success'))
                    <div data-success="success" class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                        role="alert">           
                        <strong id="successm" >{{session()->get('success')}}</strong>
                    </div>
                    
                @elseif(session()->has('error'))

                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                        role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong id="errorm">{{session()->get('error')}}</strong>
                    </div>
                @endif
            </div>