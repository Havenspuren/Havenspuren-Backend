@if (session()->has('message'))
    <div class="message position-absolute w-100 mt-1" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="alert @if (session('danger')) {{ 'alert-danger' }} @else {{ 'alert-success' }} @endif shadow-sm text-center"
                        role="alert">
                        @if (session('danger'))
                            <i class="fa-solid fa-circle-exclamation"></i>
                        @else
                            <i class="fa-solid fa-circle-check"></i>
                        @endif
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
