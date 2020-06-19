@extends('layouts.app')

@section('body')

    <div class="content">
        <div class="jumbotron border border-secondary">
            <div class="card-body">
                <h5 class="card-title mb-4">Atualizar Cliente</h5>
                <hr>
                <br>
                <form action="/clientes/{{$cli->id}}" method="POST">
                   @csrf




                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">

                                    <label for="nome">Nome:</label> <label class="required" >*</label>
                                    <input type="text" id="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome" placeholder="Ex: João Victor Ferreira Souto"
                                           value="{{ $cli->nome}}" autofocus>


                                    <div class="invalid-feedback">
                                        @if ($errors->has('nome'))
                                            {{ $errors->first('nome') }}
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="email">Email:</label> <label class="required" >*</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Ex: email@email.com" aria-label="Username" aria-describedby="basic-addon1"
                                               value="{{$cli->email}}">
                                        <div class="invalid-feedback">
                                            @if ($errors->has('email'))
                                                {{ $errors->first('email') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">


                            <div class="col-4">
                                <div class="form-group">
                                    <label for="birth_date">Dt. Nascimento:</label> <label class="required" >*</label>
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control datepicker form-control-alternative{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" id="input-birth_date"
                                               value="{{ \Carbon\Carbon::make($cli->birth_date)->format('d/m/Y')}}" required/>

                                        <input type="hidden" class="datepicker"
                                               name="birth_date_dado" id="birth_date_dado" value="{{ \Carbon\Carbon::make($cli->birth_date)->format('Y-m-d')}}"
                                               required/>

                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tel">Telefone:</label>
                                    <input type="text" id="tel" class="form-control {{ $errors->has('tel') ? 'is-invalid' : '' }}" name="tel" value="{{ $cli->telefone}}" autofocus>
                                    <div class="invalid-feedback">
                                        @if ($errors->has('tel'))
                                            {{ $errors->first('tel') }}
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>



                    <div class="pr-3" style="text-align: right;">
                        <button type="button" onClick="cancelar()" class="btn btn-cancel">Cancelar</button>
                        <button type="submit" class="btn btn-default ml-2">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script type="text/javascript">


        var date_input=$('input[name="birth_date_dado"]').val(); //our date input has the name "date"


        //máscaras
        $('#tel').mask("(99) 9999-9999?9")
            .focusout(function (event) {
                var target, phone, element;
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;
                phone = target.value.replace(/\D/g, '');
                element = $(target);
                element.unmask();
                if(phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            });

        function cancelar() {
            var url = '{{ route("lista_clientes") }}';
            window.location.href = url;
        }

        var dateDado = $('#birth_date_dado').val();

        document.getElementById("input-birth_date").value = dateDado;



    </script>

@endsection
