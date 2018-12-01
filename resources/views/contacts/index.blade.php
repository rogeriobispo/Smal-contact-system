@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
    <div class="container">
        <a href="{{ url('/auth/logout') }}" >Logout</a>
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Contato
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Contato Form -->
                    <form action="{{ action('ContactController@create') }}" method="POST" >
                    {!! csrf_field() !!}

                    <!-- Contato  -->
                        <div class="form-group">
                            <label for="nomeContato" class="control-label">Nome</label>
                            <input type="text" name="name" id="nomeContato" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="emailContato" class="control-label">Email</label>
                            <input type="text" name="email" id="emailContato" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="telContato" class="control-label">Telefone</label>
                            <input type="tel" name="phone" id="telContato" class="form-control">
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Adicionar Contato
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                @if (count($contacts) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contatos
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                <th>Contato</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <!--  Name -->
                                        <td class="table-text">
                                            <div>{{ $contact->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $contact->email }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $contact->phone }}</div>
                                        </td>
                                        <td>
                                            <form action="{{ url('contact/'.$contact->id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('DELETE') !!}

                                                <button type="submit" id="delete-contato-{{ $contact->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Apagar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    @endif
@endsection
