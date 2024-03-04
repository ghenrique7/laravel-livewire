<div>
    <h1>Atualizar Foto Perfil</h1>
    <form action="#" method="post" enctype="multipart/form-data" wire:submit.prevent="storagePhoto">
    @csrf
        @error('photo')
            {{ $message }}
        @enderror
        <input type="file" wire:model="photo">
        <button type="submit" class="btn btn-success">Enviar Foto</button>
    </form>
</div>
