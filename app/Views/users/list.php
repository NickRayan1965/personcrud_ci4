<?php $this->extend('layouts/main'); ?>
<?php $this->section('content'); ?>
<div class="container mt-3" data-bs-theme="dark">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Lista de usuarios</h1>
            <a href="<?= base_url('users/register') ?>" class="btn btn-primary">Registrar usuario</a>
        </div>
        <div class="row">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Nombre de usuario</th>
                        <th>Fecha de nacimiento</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['lastname'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['birthdate'] ?></td>
                            <td class="d-flex gap-2 justify-content-center">
                                <a href="<?= base_url('users/edit/' . $user['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="<?= base_url('users/delete/' . $user['id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
<?php $this->endSection(); ?>
<?php $this->section('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (session()->has('delete-success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Eliminado!',
            text: 'Usuario eliminado correctamente',
        });
    </script>
<?php endif; ?>
<?php if (session()->has('error-delete')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: 'No se pudo eliminar el usuario',
        });
    </script>
<?php endif; ?>
<?php $this->endSection(); ?>