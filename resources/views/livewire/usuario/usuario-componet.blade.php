<div>

    @include('livewire.usuario.create')
    @include('livewire.usuario.bloquear')
    @if (session()->has('message'))
    <script>
        alertify.success("{{ session('message') }}").delay(3000);
    </script>
    @endif
    @if (session()->has('error'))
    <script>
        alertify.error("{{ session('error') }}").delay(3000);
    </script>
    @endif
    <div class="row m-t-30">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">USUARIOS</h4>
                    <button type="button" wire:click="resetInputFields" class="btn btn-raised btn-primary m-t-10 m-b-10" data-toggle="modal" data-target=".bd-example-modal-form">
                        <i class="typcn typcn-document-add"> </i>CREAR NUEVO</button>
                    <table class="table mb-0" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>USUARIO</th>
                                <th>CORREO</th>
                                <th>ESTADO</th>
                                <th>ACIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuarios as $obj)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $obj->name }}</td>
                                <td>{{ $obj->email }}</td>
                                <td>
                                    @if($obj->estado==1)
                                    <button data-toggle="modal" data-animation="bounce" wire:click="editEstado({{ $obj->id }})" data-target=".bs-example-modal-center"  class="btn btn-outline-success btn-sm"><i class="typcn typcn-delete-outline"></i>ACTIVO</button>
                                    @else
                                    <button data-toggle="modal" data-animation="bounce" wire:click="editEstado({{ $obj->id }})" data-target=".bs-example-modal-center"  class="btn btn-outline-danger btn-sm"><i class="typcn typcn-delete-outline"></i>BLOQUEADO</button>

                                    @endif
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#modalCreate" wire:click="edit({{ $obj->id }})" class="btn btn-outline-info btn-sm"><i class="typcn typcn-edit"></i></button>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5"><center>No Existen datos</center></td>
                                </tr>
                            @endforelse
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

