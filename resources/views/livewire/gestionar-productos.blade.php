<div>
    <!--titulo-->
    <div>
        <div class="row">
            <div class="col-12 fs-6">
                <span class="fs-3 fw-bold">Lista de Productos </span> Productos | Lista de Productos
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>
    </div>
    <!--cuerpo-->
    <div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span><b>Listado de Productos</b></span>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-12 col-sm-4">
                                <label class="visually-hidden" for="buscar_producto">Producto</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fas fa-search"></i></div>
                                    <input type="text" class="form-control" id="buscar_producto"
                                        placeholder="Buscar Producto" wire:model.live='search'>
                                </div>
                            </div>
                            <div class="col-12 col-sm-8 text-right">
                                <button class="btn btn-outline-success"><i class="fas fa-file"></i> PDF</button>
                                <button class="btn btn-outline-danger"><i class="fas fa-file"></i> EXCEL</button>
                                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalProducto" wire:click='modal'><i class="fas fa-plus-circle"></i> Añadir</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Tipo</th>
                                            <th>Designacion</th>
                                            <th>Codigo</th>
                                            <th>Marca</th>
                                            <th>Categoria</th>
                                            <th class="text-center">Precio</th>
                                            <th>Unidad</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-center">Accion</th>
                                        </tr>
                                    </thead>
                                    @if ($lista_productos->count())
                                    <tbody>
                                        @forelse ($lista_productos as $produc)
                                            <tr>
                                                <td class="align-middle">
                                                    <img src="{{asset($produc->imagen) }}" class="img-thumbnail"alt="" width="64px;">
                                                </td>
                                                <td class="align-middle">{{ $produc->tipo }}</td>
                                                <td class="align-middle">{{ $produc->designacion }}</td>
                                                <td class="align-middle">{{ $produc->codigo }}</td>
                                                <td class="align-middle">{{ optional($produc->marca)->name }}</td>
                                                <td class="align-middle">{{ optional($produc->categoria)->name }}</td>
                                                <td class="align-middle text-center">s/.{{ $produc->precio }}</td>
                                                <td class="align-middle">{{ optional($produc->cunitario)->name }}</td>
                                                <td class="align-middle text-center">{{ $produc->obtener_cantidad }}</td>
                                                <td class="align-middle text-center">
                                                    <a href="{{route('admin.productos.consultar',$produc->id)}}" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                                                    <button type="button" class="btn btn-outline-success"
                                                        data-bs-toggle="modal" data-bs-target="#modalProducto"
                                                        wire:click="modal('{{ $produc->id }}')"><i
                                                            class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-outline-danger"
                                                        wire:click="eliminar({{ $produc->id }})"
                                                        id="eliminar-producto-{{ $produc->id }}"
                                                        wire:confirm="Estas seguro de Eliminar esta Producto">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                    @else
                                    <tfoot class="table-light">
                                        <tr>
                                            <td colspan="10" class="text-center" >No Hay Productos Registrados</td>
                                        </tr>
                                    </tfoot>
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-9">
                                {{ $lista_productos->links() }}
                            </div>
                            <div class="col-12 col-sm-3" style="text-align: right;" wire:model.live='pagina'>
                                <select class="form-select">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="100">100</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    @include('administrador.productos.parts.producto-modal')
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('cerrar_modal_producto', reservacion => {
            ventana = document.getElementById('cerrar_modal_producto_x').click();
        });
    </script>
@endscript
