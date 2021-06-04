<div>
    <div x-data="poke()">


        <div>
            <input type="text" wire:model="search">
            <button class="my-5 p-2 border focus:outline-none bg-green-500" wire:click="getpokes"
                    wire:loading.class="bg-gray-500">GET
            </button>

        </div>
        <div class="w-5 h-5 transition duration-500 ease-in-out transform scale-50 bg-red-300 " wire:loading></div>
        <div>

            @if($pokes)
                <div>
                    <img src="{{ $pokes['sprites']['front_default'] }}" alt="">
                    <p class="text-center">{{ $pokes['name'] }}</p>
                </div>

                <div>
                    abilities:

                    @foreach($pokes['abilities'] as $ability)
                        <p>{{ $ability['ability']['name'] }}</p>
                    @endforeach
                </div>
            @endif
        </div>

    </div>


    <script>
        function poke() {
            return {
                search: 'ditto',
                isLoading: false,
                pokes: null,
                getpokes() {
                    this.isLoading = true;
                    fetch(`https://pokeapi.co/api/v2/pokemon/${this.search}`)
                        .then(res => res.json())
                        .then(data => {
                            this.isLoading = false;
                            this.pokes = data;
                            console.log(data)
                        });
                }
            }
        }
    </script>

</div>
