<div>

<table class="table-auto">
    <thead>
    <tr class="p-5">
        <th class="p-5 border">ID</th>
        <th class="p-5 border">Name</th>
        <th class="p-5 border">Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr class="p-5">
        <td class="p-5 border">{{ $loop->index + 1 }}</td>
        <td class="p-5 border">{{ $user->name }}</td>
        <td class="p-5 border">{{ $user->email }}</td>
    </tr>
    @endforeach
    </tbody>


</table>



</div>
@push('js')
    <script type="text/javascript">
        window.onscroll = function (e) {
            if((window.innerHeight + window.scrollY) >= document.body.offsetHeight){
                window.livewire.emit('loadmore')
            }
        }
    </script>
@endpush
