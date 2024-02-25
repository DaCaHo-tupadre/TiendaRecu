<script>
    function confirmLogout() {
        if (window.confirm("¿Estás seguro de que quieres salir?")) {
            console.log("Logout confirmado, redirigiendo...");
            window.location.href = "{{ route('logout') }}";
        } else {
            console.log("Logout cancelado.");
        }
    }
</script>
@if(session('successUpdate'))
    <div>
        <h6 class="alert alert-success"> {{session('successUpdate')}} </h6>
    </div>
@endif

<button onclick="confirmLogout()" >
    Log out
</button>
<ul >
    <li >
        <a href="/home">Home</a>
    </li>
    <li c>
        <a  href="{{route('verCategorias')}}">Categorias</a>
    </li>

    @if( Auth::check() && Auth::user()->rol == 'admin')
        <li >
            <a  href="{{route('verUsuarios')}}" >Usuarios</a>
        </li>
    @endif
    <li >
        <a  href="{{route('verProductos')}}" >Productos</a>
    </li>
</ul >

<div class="container">
    @if (session('LogSuccess'))
        <div class="alert alert-success">
            {{ session('LogSuccess') }}
        </div>
    @endif
    @if(session('Permisos'))
        <div>
            <h6 class="alert alert-danger"> {{session('Permisos')}} </h6>
        </div>
    @endif
</div>

<table >
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nick</th>
        <th scope="col">nombre</th>
        <th scope="col">apellidos</th>
        <th scope="col">dni</th>
        <th scope="col">email</th>
        <th scope="col">password</th>
        <th scope="col">fecha_nacimiento</th>
        <th scope="col">rol</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>

            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->nick }}</td>
            <td>{{ $user->nombre }}</td>
            <td>{{ $user->apellidos }}</td>
            <td>{{ $user->dni }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->fecha_nacimiento}}</td>
            <td>{{ $user->rol}}</td>
            <td>
                @if( Auth::check() && Auth::user()->rol == 'admin')
                <button> <a href="{{route('editarUsuario',['id' => $user->id])}}" >Editar</a></button>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<section class="container">
    <h1>Añadir Usuario</h1>
    <div>
        @if(session('successStore'))
            <div>
                <h6 c> {{session('successStore')}} </h6>
            </div>
        @endif
        @if ($errors->any())
            <div >
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><h6 > {{ $error }} </h6></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form action="{{ route('storeUsuario') }}" method="POST">
        @csrf
        <div >
            <label for="dni">Dni</label>
            <input type="number"  name="dni" placeholder="dni" value="{{ old('dni') }}">
        </div>
        <div >
            <label for="nombre">Nombre</label>
            <input type="text"  name="nombre" placeholder="nombre" value="{{ old('nick') }}">
        </div>
        <div >
            <label for="apellido">Apellidos</label>
            <input type="text"  name="apellidos" placeholder="Apellidos"
                   value="{{ old('apellidos') }}">
        </div>
        <div >
            <label for="nick">Nick</label>
            <input type="text"  name="nick" placeholder="nick" value="{{ old('nick') }}">
        </div>
        <div >
            <label for="email">Email</label>
            <input type="email"  name="email" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div >
            <label for="password">Contraseña</label>
            <input type="password"  name="password" placeholder="Contraseña">
        </div>
        <div >
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date"  name="fecha_nacimiento" placeholder="Fecha de Nacimiento"
                   value="{{ old('fecha_nacimiento') }}">
        </div>
        <div >
            <label for="rol">Rol</label>
            <select  name="rol">
                <option value="user" {{ old('rol') === 'user' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ old('rol') === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
        </div>
        <button type="submit" >Submit</button>
    </form>
</section>

<section >
    <h1>Borrar Usuario</h1>

    @if(session('successDestroy'))
        <div >
            {{ session('successDestroy') }}
        </div>
    @endif

    @if(session('errorDestroy'))
        <div >
            {{ session('errorDestroy') }}
        </div>
    @endif

    <form action="{{ route('destroyUsuario') }}" method="POST">
        @csrf
        @method('DELETE')
        <div >
            <label for="idSolicitado">Id a Borrar:</label>
            <input type="text" name="idSolicitado"  placeholder="Ingrese el DNI">
        </div>
        <button type="submit" >Borrar</button>
    </form>
</section>

