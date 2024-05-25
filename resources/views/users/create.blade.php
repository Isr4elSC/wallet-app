<x-layouts.app title="Creacion de usuario" meta-description="'Creación de informacion del usuario">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Name</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</x-layouts.app>
