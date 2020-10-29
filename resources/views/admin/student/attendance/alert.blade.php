@if(isset($message))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Message : </strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
             </div>
        @endif
@if(isset($error_message))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Message : </strong> {{ $error_message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
             </div>
        @endif