<div>

    <form wire:submit.prevent="create" method="post">
        @csrf
        <div class="my-5">
            <input type="text" wire:model="name" placeholder="..name" class="p-3 border">
            <p>@error('name') {{ $message }} @enderror</p>
        </div>
        <div class="my-5">
            <input type="text" wire:model="desc" placeholder="..desc" class="p-3 border">
            <p>@error('desc') {{ $message }} @enderror</p>
        </div>

        <button type="submit">Send</button>
    </form>
</div>
