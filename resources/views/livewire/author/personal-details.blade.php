<div>
    
    <form wire:submit.prevent ="UpdateDetails()" method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" wire:model='name'>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="user_name" placeholder="Username" wire:model='user_name'>
                    @error('user_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="email" wire:model='email' disabled>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Biography</label>
            <textarea class="form-control" name="biography" rows="6" placeholder="Content.." wire:model='user_biography'></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

</div>
