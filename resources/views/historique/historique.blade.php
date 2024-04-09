@extends('app')

@section('titre', 'Nouveau Processus')

@section('option_btn')

    <li class="dropdown chats-dropdown">
        <a href="{{ route('index_accueil') }}" class="dropdown-toggle nk-quick-nav-icon">
            <div class="icon-status icon-status-na">
                <em class="icon ni ni-home"></em>
            </div>
        </a>
    </li>

@endsection

@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                                    <div class="nk-block-head-content" style="margin:0px auto;">
                                        <h3 class="text-center">
                                            <span>Historique</span>
                                            <em class="icon ni ni-property"></em>
                                        </h3>
                                    </div>
                                </div>
                    </div>
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-md-12 col-xxl-12">
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <table class="datatable-init table" data-export-title="Export">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Date et heure</th>
                                                    <th>Action éffecttuée</th>
                                                    <th>Page</th>
                                                    <th>Nom et prénom</th>
                                                    <th>Poste</th>
                                                    <th>matricule</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($historiques as $key => $historique)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($historique->created_at)->translatedFormat('j F Y '.' à '.' H:i:s') }}</td>
                                                        <td>{{ $historique->nom_action }}</td>
                                                        <td>{{ $historique->nom_formulaire }}</td>
                                                        <td>{{ $historique->nom }}</td>
                                                        <td>{{ $historique->poste }}</td>
                                                        <td>{{ $historique->matricule }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
