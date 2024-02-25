<div>
    <div class="container">
        <hr>
        <aside class="col-sm-4">
        </aside>

        <aside class="container col-sm-4">
            <div class="card">
                <article class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">Register</h4>
                    <hr>
                    <!-- Gestion de errores  -->
                    @if (session('RegSuccess'))
                        <div>
                            {{ session('RegSuccess') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- dni  -->
                        <div>
                            <div>
                                <div>
                                    <span> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="dni" placeholder="dni" type="text">
                            </div>
                        </div>
                        <!-- email  -->
                        <div>
                            <div>
                                <div>
                                    <span> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="email" placeholder="Email" type="email">
                            </div>
                        </div>
                        <!-- nick  -->
                        <div>
                            <div>
                                <div>
                                    <span> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="nick" placeholder="Nick" type="text">
                            </div>
                        </div>
                        <!-- nombre  -->
                        <div>
                            <div>
                                <div>
                                    <span> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="nombre" placeholder="nombre" type="text">
                            </div>
                        </div>

                        <!-- password  -->
                        <div>
                            <div>
                                <div>
                                    <span> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="password" placeholder="Contraseña" type="password">
                            </div>
                        </div>




                        <!-- apellidos -->
                        <div>
                            <div>
                                <div>
                                    <span> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="apellidos" placeholder="Apellidos" type="text">
                            </div>
                        </div>
                        <!-- fecha_nacimiento -->
                        <div>
                            <div>
                                <div>
                                    <span><p>nacimento</p></span>

                                </div>
                                <input name="fecha_nacimiento" placeholder="Fecha de nacimiento" type="date">
                            </div>
                        </div>


                        <!--  rol -->
                        <div>
                            <div>
                                <div>
                                    <span> <i class="fa fa-user"></i> </span>
                                </div>
                                <select name="rol">
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>

                                </select>
                            </div>
                        </div>



                        <div>
                            <input  type="submit">
                        </div>
                        <p><a href="{{route('verLog')}}">login</a></p>
                    </form>
                </article>
            </div> <!-- card.// -->

        </aside> <!-- col.// -->

    </div> <!-- row.// -->
</div>
<!--container end.//-->


</div>
