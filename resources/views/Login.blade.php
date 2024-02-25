<div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


    <div >
        <hr>


        <aside >
            <div >
                <article >
                    <h4 >Sign in</h4>
                    <hr>


                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('LogError'))
                        <div>
                            <h6 > {{session('LogError')}} </h6>
                        </div>
                    @endif
                    <form method="POST" action="{{route('logged')}}">
                        @csrf
                        <!-- nick  -->
                        <div >
                            <div>
                                <div >
                                    <span > <i ></i> </span>
                                </div>
                                <input name="nick"     placeholder="Nick" type="text">
                            </div>
                        </div>


                        <div >
                            <div >
                                <div >
                                    <span > <i ></i> </span>
                                </div>
                                <input name="password"  placeholder="Contraseña" type="password">
                            </div>
                        </div>
                        <div >
                            <button type="submit" > Login  </button>
                        </div>
                        <p><a href="{{route('verReg')}}" class="btn">Register</a></p>
                    </form>
                </article>
            </div>
        </aside>
    </div>
</div>


</div>
