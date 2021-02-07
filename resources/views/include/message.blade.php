@if (session('status'))
    <div class="alert alert-success text-white font-italic font-weight-bold ">
        {{ session('status') }}
    </div>
           @endif

           @if (session('status1'))
           <div class="alert alert-danger text-white font-italic font-weight-bold">
            {{ session('status1') }}
        </div>
           @endif

           @include('sweetalert::alert')