<div>

    @include('livewire.periodo.create')
    @include('livewire.periodo.bloquear')
    @if (session()->has('message'))
    <script>
        alertify.success("{{ session('message') }}").delay(3000);
    </script>
    @endif
    <div class="row m-t-30">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">PERIODOS</h4>
                    <button type="button" class="btn btn-raised btn-primary m-t-10 m-b-10" data-toggle="modal" data-target=".bd-example-modal-form">
                        <i class="typcn typcn-document-add"> </i>CREAR NUEVO</button>
                    <table class="table mb-0" id="datatable2">
                        <thead>
                            <tr>
                                <th>DESCRIPCION</th>
                                <th>NUMERO</th>
                                <th>PORCENTAJE</th>
                                <th>ESTADO</th>
                                <th>ACIONES</th>
                            </tr>
                        </thead>
                        @php
                            $suma=0;
                        @endphp
                        <tbody>
                            @forelse ($periodos as $periodo)
                            @php
                                $suma+=$periodo->porcentaje;
                            @endphp
                            <tr>
                                <td>{{ $periodo->descripcion }}</td>
                                <td>{{ $periodo->numero }}</td>
                                <td>{{ $periodo->porcentaje }}%</td>
                                <td>
                                    @if($periodo->estado==1)
                                    <button data-toggle="modal" data-animation="bounce" wire:click="editEstado({{ $periodo->id }})" data-target=".bs-example-modal-center"  class="btn btn-outline-success btn-sm"><i class="typcn typcn-delete-outline"></i>ACTIVO</button>
                                    @else
                                    <button data-toggle="modal" data-animation="bounce" wire:click="editEstado({{ $periodo->id }})" data-target=".bs-example-modal-center"  class="btn btn-outline-danger btn-sm"><i class="typcn typcn-delete-outline"></i>BLOQUEADO</button>

                                    @endif
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#modalCreate" wire:click="edit({{ $periodo->id }})" class="btn btn-outline-info btn-sm"><i class="typcn typcn-edit"></i></button>
                                </td>
                            </tr>

                            @empty
                                <tr>
                                    <td colspan="4"><center>No Existen datos</center></td>
                                </tr>
                            @endforelse
                            <tr>
                                <th colspan="2">
                                    TOTAL
                                </th>
                                <td>
                                    {{ $suma }}%
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

