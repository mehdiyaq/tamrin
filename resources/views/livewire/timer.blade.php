<div>
    <p class="text-4xl text-center mt-20">We are Opening Soon!</p>
    <div class="flex items-center justify-between my-10 text-center">
        <div>
            <p x-text="theDay"></p>
            <p>Day</p>
        </div>
        <div>
            <p x-text="theHours"></p>
            <p>Hours</p>
        </div>
        <div>
            <p x-text="theMinutes"></p>
            <p>Minutes</p>
        </div>
        <div>
            <p x-text="theSeconds"></p>
            <p>Seconds</p>
        </div>

    </div>
</div>


<script>
    function countdown() {


        return {
            theDay:null, theHours:'', theMinutes:'', theSeconds:'',

            init() {
                setInterval(() => {
                    let countTo = new Date("May 30, 2021 00:00:00").getTime();
                    let now = new Date().getTime();
                    let gap = countTo - now;

                    let seconds = 1000;
                    let minutes = seconds * 60;
                    let hours = minutes * 60;
                    let day = hours * 24;
                    this.theDay = Math.floor(gap / day);
                    this.theHours = Math.floor((gap % day) / hours);
                    this.theMinutes = Math.floor((gap % hours) / minutes);
                    this.theSeconds = Math.floor((gap % minutes) / seconds);

                }, 1000)
            }
        }
    }
</script>
