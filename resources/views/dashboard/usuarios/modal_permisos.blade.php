<div wire:ignore.self class="modal fade" id="modal-user-permisos" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fondo">
            <div class="modal-header">
                <h4 class="modal-title">
                    Permisos de Usuario
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" >{{ $edit_name }}</li>
                            <li class="breadcrumb-item active" >{{ $edit_email }}</li>
                            <li class="breadcrumb-item active" >{{ $rol_nombre }}</li>
                            <li class="breadcrumb-item active" >{!! verEstatusUsuario($estatus, true) !!}</li>
                        </ol>
                    </div>
                </div>

                @include('dashboard.usuarios.show_permisos')

            </div>
            <div class="modal-footer row col-12 justify-content-between">
                <button type="button" class="btn btn-danger btn-sm" {{--wire:click="destroy({{ $roles_id }})"--}}>
                    <i class="fas fa-trash-alt"></i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" {{--wire:click="updateRolUsuarios"--}}>
                    Actualizar Permisos
                </button>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" wire:click="limpiar" id="button_permisos_modal_cerrar">
                    {{ __('Close') }}
                </button>
            </div>

            {!! verSpinner() !!}

        </div>
    </div>
</div>
