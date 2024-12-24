<x-layout>
    <div class="content full">
        <!--Crud categorias-->
        <x-categories :data="$data"/>
        <!--Crud notas-->
        <x-notes :data="$data"/>
        <!--Form de criação/update da nota-->
        <x-form :data="$data"/>
        <x-show :data="$data"/>
    </div>
</x-layout>