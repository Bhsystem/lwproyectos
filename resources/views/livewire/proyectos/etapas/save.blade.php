    <div>       
        <form wire:submit.prevent="submit({{$projectId}})" wire:key >     
                <tr>
                    <td>
                        <input type="text" wire:model="descripcion">
                          <x-jet-input-error for="descripcion"/> 
                        {{$descripcion}}

                    </td>
                    <td><input type="text"  wire:model="descripcion"></td>
                    <td><input type="text"  wire:model="etapaId"></td>
                </tr>
                <button>Guardar</button>
        </form>
    </div>