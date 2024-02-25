<script>
    function confirmDelete() {
        return confirm("¿Estás seguro de que quieres eliminar esta categoría?");
    }
</script>

@if(session('successUpdateCategoria'))
    <div>
        <h6 class="alert alert-success">{{ session('successUpdateCategoria') }}</h6>
    </div>
@endif
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

<h1>Gestión de Categorías</h1>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->id_categoria }}</td>
            <td>{{ $categoria->nombre }}</td>
            <td>{{ $categoria->descripcion }}</td>
            <td>
                <a href="{{ route('editarCategoria', ['id' => $categoria->id_categoria]) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('destroyCategoria') }}" method="POST" style="display: inline-block;" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_categoria" value="{{ $categoria->id_categoria }}">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<section class="container">
    <h1>Añadir Categoría</h1>
    <div>
        @if(session('successStoreCategoria'))
            <div>
                <h6>{{ session('successStoreCategoria') }}</h6>
            </div>
        @endif
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><h6>{{ $error }}</h6></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <form action="{{ route('storeCategoria') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
        </div>
        <div>
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" placeholder="Descripción" value="{{ old('descripcion') }}">
        </div>
        <button type="submit">Añadir Categoría</button>
    </form>
</section>
