<x-app-layout>

    <div
        class="bg-gradient-to-br from-purple-800 to-blue-700 h-screen flex items-center justify-center"
        x-data="animation()"
        x-init="animate()"
    >
        <div>
            <h1 class="h-14 text font-bold text-7xl tracking-wide text-white">
                <template x-for="(c, i) in text.split('')"
                ><span
                        x-text="c"
                        class="opacity-0 transition delay-75 ease-in"
                        :class="{'opacity-100':char>=i}"
                    ></span
                    ></template>
            </h1>
            <button
                class="block bg-white mx-auto mt-8 px-4 py-1 rounded-lg"
                @click="char = -5"
            >Play animation</button>
        </div>
    </div>

    @push('js')
        <script>
            function animation() {
                return {
                    text: "Alpine Animation",
                    char: -1,
                    animate() {
                        let timer = setInterval(() => {
                            this.char++;
                            if (char == this.text.length) {
                                clearInterval(timer);
                                timer = null;
                                return;
                            }
                        }, 50);
                    }
                };
            }

        </script>
    @endpush
</x-app-layout>
