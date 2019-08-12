
{{--@section('content')--}}

{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}

{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}





{{--                        <form class="" action="/upload-arquivos" method="post" enctype="multipart/form-data">--}}
{{--                            {{csrf_field()}}--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Nome</label>--}}
{{--                                <input type="text" class="form-control" name="nome">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="file" name="arquivo">--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-success">Adicionar</button>--}}
{{--                        </form>--}}
{{--                </div>--}}
{{--                <div class="panel-footer" style="padding:0px;">--}}
{{--                    <table class="table">--}}
{{--                        <tr>--}}
{{--                            <th>Nome</th>--}}
{{--                            <th>Tipo</th>--}}
{{--                            <th></th>--}}
{{--                        </tr>--}}
{{--                        @foreach($arquivos as $arquivo)--}}
{{--                            <tr>--}}
{{--                                <td>{{$arquivo->nome}}</td>--}}
{{--                                <td>{{$arquivo->tipo}}</td>--}}


{{--                                <td>  <a href="" class="btn btn-outline-warning">Download</a></td>--}}
{{--                                <td><a href = 'delete/{{ $arquivo->id }}'>Delete</a></td>--}}

{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </table>--}}
{{--                </div>--}}


{{--        </div>--}}
