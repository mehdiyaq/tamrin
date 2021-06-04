<div class="w-1/4 mx-auto m-20">

    <h1 class="m-20">{{ $name }}</h1>
    <select name="" id="" wire:model.defer="selections" multiple>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="4">Four</option>
    </select>

    <h1 class="my-10">You have selected : {{ implode(', ', $selections) }}</h1>

    <button class="my-5" wire:click="add">ADD</button>

    <hr>

    <div class="my-10">
        <select name="" id="">
            @foreach(\App\Models\Post::all() as $post)
                <option
                    class="{{ in_array('1', explode(', ', $post->selection)) ? 'text-red-500': '' }} " value="1">{{ $post->selection }}</option>
            @endforeach
        </select>
    </div>

    <livewire:house />
</div>


