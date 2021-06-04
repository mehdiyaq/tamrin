<x-app-layout>
    <div class="flex flex-col w-full h-full m-36">
        <p class="text-sm text-center text-gray-500 w-60 mx-auto">PIN code entry input with arrow navigation, pasting anywhere, allowing only numbers, automatic focus on input, custom length & checking for correct PIN.<br>by <a href="https://github.com/rehhouari" class="text-gray-900">@rehhouari</a></p>
        <div x-data="pincode()" class="flex flex-col w-68 h-60 bg-gray-100 text-gray-900 text-center mx-auto rounded mt-2">
            <p class="font-semibold">Enter PIN Code</p>
            <div>
                <template x-for="i in length">
                    <input type="text" :name="'pin'+i" maxlength="1"
                           class="bg-white py-5 text-4xl unselectable font-bold rounded inline w-12 text-center select-none transition-all"
                           @paste.prevent="paste(event)"
                           @keydown="type(event,i)"
                           @keydown.ctrl.a.prevent
                           @mousemove.prevent.stop
                           @keydown.arrow-right.prevent="goto(i+1)"
                           @keydown.arrow-left.prevent="goto(i-1)"
                           :value="input[i-1]!=null?input[i-1]:0"
                           :x-ref="'pin'+i" placeholder="0"
                           :disabled="input.length < i-1"
                           :autofocus="i==1">
                </template>
                <div>
                    <p class="text-md font-bold  text-gray-500 h-5" id="feedback"></p>
                    <p class="text-xs mt-2 text-gray-500"><span class="font-bold">1234</span> is the correct PIN.<br>you can try copy pasting that directly!</p>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function pincode() {
                return {
                    length: 4,
                    input: [],
                    correctPin: "1234",
                    // this will only check when inputing the last number
                    // usefull if you're going to limit number of checks
                    onlyCheckOnLastFieldInput: true,
                    paste(event) {
                        // raw pasted input
                        let pasted = event.clipboardData.getData("text");
                        // only get numbers
                        pasted = pasted.replace(/\D/g, "");
                        // don't get more than the PIN length
                        pasted = pasted.substring(0, this.length);
                        // if after all that sanitazation the string is not empty
                        if (pasted) {
                            // split the pasted string into an array and load it
                            this.input = pasted.split("");
                            // check if the PIN is correct
                            this.check();
                        }
                    },
                    type(event, index) {
                        if (event.ctrlKey && event.key == 'v') {
                            console.log('ctrl-v');
                        } else if (event.keyCode == 8) {
                            event.stopPropagation();
                            event.preventDefault();
                            this.input[index - 1] = 0;
                        } else {
                            // only allow numbers
                            let key = event.key.replace(/\D/g, "");
                            if (key != "") {
                                console.log(key);
                                this.input[index - 1] = key;
                            }
                        }
                        // check if the PIN is correct
                        if (
                            (this.onlyCheckOnLastFieldInput && index == this.length) ||
                            !this.onlyCheckOnLastFieldInput
                        ) {
                            this.check();
                        }
                        // go to the next field
                        // must happen on nextTick cause the field can be disabled.
                        this.$nextTick(() => {
                            this.goto(index + 1);
                        });
                    },
                    goto(n) {
                        if (!n || n > this.length) {
                            n = 1;
                        }
                        let el = document.querySelector(`input[name=pin${n}]`);
                        el.focus();
                    },
                    check() {
                        if (this.input.join("") == this.correctPin) {
                            feedback.innerHTML = "Correct!";
                        } else {
                            feedback.innerHTML = "Wrong!";
                        }
                    }
                };
            }

        </script>
    @endpush
</x-app-layout>


