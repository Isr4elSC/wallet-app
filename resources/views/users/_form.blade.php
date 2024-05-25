        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control"
                value="{{ old('title', $user->nombre) }}" required>
            @error('nombre')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control"
                value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required
                value="{{ old('password', $user->password) }}">
            @error('password')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirma Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                required>
            @error('password_confirmation')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
