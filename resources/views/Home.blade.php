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

<button onclick="confirmLogout()" >
    Log out
</button>
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
