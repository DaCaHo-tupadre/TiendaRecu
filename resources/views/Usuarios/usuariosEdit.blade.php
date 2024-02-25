
<nav >
    <a  href="{{ route('verUsuarios') }}">Volver</a>
</nav>

<section >
    <h1>Editar Usuario</h1>
    @if ($errors->any())
        <div >
            <ul>
                @foreach ($errors->all() as $error)
                    <li><h6> {{ $error }} </h6></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('updateUsuario') }}" method="POST">
        @csrf
        @method('POST')

        <div >
            <label for="id">id</label>
            <input type="text"  name="id" value="{{ $user->id }}" readonly>
        </div>

        <div >
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre" value="{{ $user->nombre }}" >
        </div>
        <div >
            <label for="apellidos">Apellidos</label>
            <input type="text"  name="apellidos" placeholder="Apellidos" value="{{ $user->apellidos }}" >
        </div>
        <div >
            <label for="dni">dni</label>
            <input type="text" name="dni" placeholder="Dni" value="{{ $user->dni }}" >
        </div>
        <div>
            <label for="nick">Nick</label>
            <input type="text" class="form-control" name="nick" placeholder="nick" value="{{ $user->nick }}">
        </div>
        <div >
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
        </div>

        <div >
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" placeholder="Contraseña" value="{{ $user->password }}" >
        </div>
        <div >
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $user->fecha_nacimiento }}">
        </div>
        <div>
            <label for="rol">Rol</label>
            <select name="rol">
                <option value="user" {{ $user->rol === 'user' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ $user->rol === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>
        <button type="submit" >Guardar cambios</button>
    </form>
</section>
