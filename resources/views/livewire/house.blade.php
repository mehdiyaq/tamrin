<div>
    <div id="house">
<p>HOSUE</p>
    </div>
</div>


<script>
    window.addEventListener('show', e => {
        console.log(e.detail.msg)
        document.querySelector('#house').classList.add('hidden');
    })
</script>
