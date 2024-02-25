
    <section class="container">
        <h1>Editar Categoría</h1>
        <div>
            @if(session('successUpdate'))
                <div>
                    <h6>{{ session('successUpdate') }}</h6>
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
        <form action="{{ route('updateCategoria') }}" method="POST">
            @csrf
            <div>
                <label for="id">id</label>
                <input type="text" name="id" placeholder="id" value="{{ $categoria->id_categoria }}"readonly>
            </div>
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre" value="{{ $categoria->nombre }}">
            </div>
            <div>
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" placeholder="Descripción" value="{{ $categoria->descripcion }}">
            </div>
            <input type="hidden" name="id" value="{{ $categoria->id_categoria }}">
            <button type="submit">Actualizar</button>
        </form>
    </section>
