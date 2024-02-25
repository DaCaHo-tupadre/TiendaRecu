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

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Unidades</th>
        <th>Precio Unitario</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id_producto }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->unidades }}</td>
            <td>{{ $producto->precio_unitario }}</td>
            <td>{{ $producto->categoria }}</td>
            <td>
                <a href="{{ route('editProducto', ['id' => $producto->id_producto]) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('destroyProducto') }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
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
    <form action="{{ route('storeProducto') }}" method="POST">
        @csrf
        <div >
            <label for="nombre">nombre</label>
            <input type="text"  name="nombre" placeholder="nombre" value="{{ old('nombre') }}">
        </div>
        <div >
            <label for="descripcion">descripcion</label>
            <input type="text"  name="descripcion" placeholder="descripcion" value="{{ old('descripcion') }}">
        </div>
        <div >
            <label for="unidades">unidades</label>
            <input type="number"  name="unidades" placeholder="unidades" value="{{ old('unidades') }}">
        </div>
        <div >
            <label for="precio_unitario">precio_unitario</label>
            <input type="number"  name="precio_unitario" placeholder="precio_unitario" value="{{ old('precio_unitario') }}">
        </div>
        <div >
            <label for="categoria">categoria</label>
            <input type="number"  name="categoria" placeholder="categoria" value="{{ old('categoria') }}">
        </div>

        <button type="submit" >Submit</button>
    </form>
</section>

