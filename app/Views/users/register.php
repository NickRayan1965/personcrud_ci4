<?php $this->extend('layouts/main'); ?>
<?php $this->section('content'); ?>
<div class="container vh-100 d-flex align-items-center col-10 col-md-5">
    <div class="card card-body">
        <form action="<?= base_url('users/'. ($isFormEdit == 1 ? 'edit' : 'register')) ?>" method="post">
            <?php if ($isFormEdit) : ?>
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <?php endif; ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                <div><?= isset($validation) ? $validation->getError('name') : '' ?></div>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user['lastname'] ?>">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>"
                >
                <div><?= isset($validation) ? $validation->getError('username') : '' ?></div>

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= $user['password'] ?>">
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $user['birthdate'] ?>">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Registrarse</button>
            </div>
        </form>
    </div>
</div>
<?php $this->endSection(); ?>
<?php $this->section('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (session()->has('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '!Perfecto!',
            text: '<?php echo session()->get('success') ?>',
        });
    </script>
<?php endif; ?>
<?php if (session()->has('error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '<?php echo session()->get('error') ?>',
        });
    </script>
<?php endif; ?>
<?php $this->endSection(); ?>