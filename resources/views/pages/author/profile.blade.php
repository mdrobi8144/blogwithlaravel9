@extends('layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? pageTitle : "Author | Profile")
@section('content')
    
@livewire('author.author-profile-header')
<hr>
<div class="row">
    <div class="card">
        <ul class="nav nav-tabs" data-bs-toggle="tabs">
            <li class="nav-item">
                <a href="#tabs-details" class="nav-link active" data-bs-toggle="tab">Personal Details</a>
            </li>
            <li class="nav-item">
                <a href="#tabs-password" class="nav-link" data-bs-toggle="tab">Change Password</a>
            </li>
        </ul>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active show" id="tabs-details">
                    <div>
                        @livewire('author.personal-details')
                    </div>
                </div>
                <div class="tab-pane" id="tabs-password">
                    <div>
                        @livewire('author.change-password')
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>


@endsection
@push('scripts')
    <script>
        $('#_authorProfilePic').ijaboCropTool({
            preview : '',
            setRatio:1,
            allowedExtensions: ['jpg', 'jpeg','png'],
            buttonsText:['CROP','QUIT'],
            buttonsColor:['#30bf7d','#ee5155', -15],
            processUrl:'{{ route("author.change-profile-pic") }}',
            withCSRF:['_token','{{ csrf_token() }}'],
            onSuccess:function(message, element, status){
                //alert(message);
                Livewire.emit('refreshPageTopHeader');
                Livewire.emit('refreshProfileTopHeader');
                toastr.success(message);
            },
            onError:function(message, element, status){
                //alert(message);
                toastr.error(message);
            }
       });
    </script>
@endpush