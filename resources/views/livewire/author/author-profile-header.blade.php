<div>
    
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="avatar avatar-md" style="background-image: url({{ $author->picture }})"></span>
            </div>
            <div class="col-md-8">
                <h2 class="page-title">{{ $author->name }}</h2>
                <div class="page-subtitle">
                    <div class="row">
                        <div class="col-auto">
                            <a href="#" class="text-reset">{{ $author->user_name }} | {{ $author->authorType->name }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto d-md-flex">
                <input type="file" name="author_profile_pic" id="_authorProfilePic" class="d-none" onchange="dispatchEvent(new InputEvent('input'))">
                <a href="#" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('_authorProfilePic').click();">
                    Change Picture
                </a>
                <!--<input type="file" name="user_pic" id="user_pic" class="d-none">
                <a href="javascript:void(0)" class="btn btn-primary" id="pic_change_btn">Change Picture</a>-->
            </div>
        </div>
    </div>

</div>
