<div x-data="{name:@entangle('name')}">

    <div class="flex space-x-10">
        <a  @click="$wire.dec('KAM')">-</a>
        <p>{{ $num }}</p>
        <a @click="$wire.dec('ZIAD')">+</a>
    </div>

    <div>{{ $name }}</div>
</div>
