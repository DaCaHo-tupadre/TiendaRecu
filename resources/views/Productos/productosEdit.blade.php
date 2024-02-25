<nav>
    <a href="{{ route('verProductos') }}">Volver</a>
</nav>

<section>
    <h1>Editar Producto</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li><h6>{{ $error }}</h6></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('updateProducto') }}" method="POST">
        @csrf
        @method('POST')

        <div>
            <label for="id">ID</label>
            <input type="text" name="id" value="{{ $producto->id_producto }}" readonly>
        </div>

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre" value="{{ $producto->nombre }}">
        </div>

        <div>
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" rows="4" cols="50">{{ $producto->descripcion }}</textarea>
        </div>

        <div>
            <label for="unidades">Unidades</label>
            <input type="number" name="unidades" value="{{ $producto->unidades }}">
        </div>

        <div>
            <label for="precio_unitario">Precio Unitario</label>
            <input type="number" step="0.01" name="precio_unitario" value="{{ $producto->precio_unitario }}">
        </div>

        <div>
            <label for="categoria">Categoría</label>
            <input type="number" name="categoria" value="{{ $producto->categoria }}">

        </div>

        <button type="submit">Guardar cambios</button>
    </form>
</section>
