<div>
    @include('livewire.sede.create')
    @include('livewire.sede.bloquear')
    @if (session()->has('message'))
    <script>
        alertify.success("{{ session('message') }}").delay(3000);
    </script>
    @endif
    <div class="row m-t-30">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">SEDES</h4>
                    <button type="button" class="btn btn-raised btn-primary m-t-10 m-b-10" data-toggle="modal" data-target=".bd-example-modal-form">
                        <i class="typcn typcn-document-add"> </i>CREAR NUEVO</button>
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>DIRECCION</th>
                                <th>TELEFONO</th>
                                <th>DANE</th>
                                <th>ESTADO</th>
                                <th>ACIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sedes as $sede)
                                <tr>
                                    <td>{{ $sede->nombre }}</td>
                                    <td>{{ $sede->direccion }}</td>
                                    <td>{{ $sede->telefono }}</td>
                                    <td>{{ $sede->dane }}</td>
                                    <td>
                                        @if($sede->estado==1)
                                        <button data-toggle="modal" data-animation="bounce" wire:click="editEstado({{ $sede->id }})" data-target=".bs-example-modal-center"  class="btn btn-outline-success btn-sm"><i class="typcn typcn-delete-outline"></i>ACTIVO</button>
                                        @else
                                        <button data-toggle="modal" data-animation="bounce" wire:click="editEstado({{ $sede->id }})" data-target=".bs-example-modal-center"  class="btn btn-outline-danger btn-sm"><i class="typcn typcn-delete-outline"></i>BLOQUEADO</button>

                                        @endif
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#modalCreate" wire:click="edit({{ $sede->id }})" class="btn btn-outline-info btn-sm"><i class="typcn typcn-edit"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

