@extends('app')

@section('titre', 'Liste des Utilisateurs')

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
                        <div class="nk-block-head nk-block-head-sm" >
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content" style="margin:0px auto;">
                                        <h3 class="text-center">
                                            <span>Liste des Utilisateurs</span>
                                            <em class="icon ni ni-list-index"></em>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-lg-12 col-xxl-12">
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <table class="datatable-init table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Matricule</th>
                                                    <th>Nom et Prénoms</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Poste</th>
                                                    <th>Date de création</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $key => $user)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $user->matricule }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->tel }}</td>
                                                        <td>{{ $user->poste }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('j F Y '.' à '.' h:i:s') }}</td>
                                                        <td>
                                                        	<div class="d-flex">
															    <form method="post" action="{{ route('index_user_modif') }}">
															        @csrf
															        <input type="text" name="id" value="{{ $user->id }}" style="display: none;">
															        <a data-bs-toggle="modal"
		                                                                data-bs-target="#modalDetail{{ $user->id }}"
		                                                                href="#" class="btn btn-icon btn-white btn-dim btn-sm btn-warning">
		                                                                <em class="icon ni ni-eye"></em>
		                                                            </a>
															        <button type="submit" class="btn btn-icon btn-white btn-dim btn-sm btn-info">
															            <em class="icon ni ni-edit"></em>
															        </button>
															    </form>
															</div>
                                                        </td>
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

    @foreach($users as $key => $user)
        <div class="modal fade zoom" tabindex="-1" id="modalDetail{{ $user->id }}">
		    <div class="modal-dialog modal-lg" role="document" style="width: 100%;">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title">Informations</h5>
		                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
		            </div>
		            <div class="modal-body">
		                <form class="nk-block">
		                    <div class="row g-gs">
		                        <div class="col-lg-12">
		                            <div class="row g-gs">
		                                <div class="col-lg-12 " id="groupesContainer">
		                                    <div class="card ">
		                                        <div class="card-inner">
		                                            <div class="row g-4">
		                                                <div class="col-lg-12">
		                                                    <div class="form-group">
		                                                        <label class="form-label" for="Cause">
		                                                            Matricule
		                                                        </label>
		                                                        <div class="form-control-wrap">
		                                                            <input value="{{ $user->matricule }}" type="text" class="form-control" readonly>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-6">
		                                                    <div class="form-group">
		                                                        <label class="form-label" for="Cause">
		                                                            Nom et Prénoms
		                                                        </label>
		                                                        <div class="form-control-wrap">
		                                                            <input value="{{ $user->name }}" type="text" class="form-control" readonly>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-6">
		                                                    <div class="form-group">
		                                                        <label class="form-label" for="corectif">
		                                                            Email
		                                                        </label>
		                                                        <div class="form-control-wrap">
		                                                            <input value="{{ $user->email }}" readonly type="text" class="form-control">
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-6">
		                                                    <div class="form-group">
		                                                        <label class="form-label" for="preventif">
		                                                            Contact
		                                                        </label>
		                                                        <div class="form-control-wrap">
		                                                            <input value="{{ $user->tel }}" readonly type="text" class="form-control">
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-6">
		                                                    <div class="form-group">
		                                                        <label class="form-label" for="preventif">
		                                                            Poste
		                                                        </label>
		                                                        <div class="form-control-wrap">
		                                                            <input value="{{ $user->poste }}" readonly type="text" class="form-control">
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-lg-12">
		                            <div class="row g-gs">
		                                <div class="col-lg-12 ">
		                                    <div class="card">
		                                        <div class="card-inner">
		                                            <div class="card-head">
		                                                <h5 class="card-title">
		                                                    Autorisation des différentes fenêtres
		                                                </h5>
		                                            </div>
		                                            <div class="row g-4">
		                                                <div class="col-lg-12">
		                                                    <div class="form-group">
		                                                        <label class="form-label" for="Cause">
		                                                            ADMINISTRATION
		                                                        </label>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->new_user === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->new_user === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                        	Nouveau Utilisateur
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->list_user === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->list_user === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Liste des Utilisateurs
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->new_poste === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->new_poste === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Nouveau Poste
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->list_poste === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->list_poste === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Liste des Postes
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->historiq === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->historiq === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Historique
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->stat === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->stat === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Statistique
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-12">
		                                                    <div class="form-group">
		                                                        <label class="form-label" for="Cause">
		                                                            PROCESSUS
		                                                        </label>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
			                                                        @if ($user->new_proces === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->new_proces === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Nouveau Processus
			                                                    </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->list_proces === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->list_proces === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Liste des Processus
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-12">
		                                                    <div class="form-group">
		                                                        <label class="form-label" for="Cause">
		                                                            RÉCLAMATION
		                                                        </label>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->new_recla === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->new_recla === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Nouvelle Réclamation
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->verif_recla === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->verif_recla === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Validation des Réclamations
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->recla_non_a === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->recla_non_a === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Réclamation non acceptées
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->list_recla === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->list_recla === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Suivis des Réclamations
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-12">
		                                                    <div class="form-group">
		                                                        <label class="form-label" for="Cause">
		                                                            LISTE
		                                                        </label>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->list_cause === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->list_cause === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Liste des Causes
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->list_r_r === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->list_r_r === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Liste du résumé des réclamations
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-12">
		                                                    <div class="form-group">
		                                                        <label class="form-label" for="Cause">
		                                                            ACTIONS
		                                                        </label>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->controle_action === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->controle_action === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Contrôle des actions
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                                <div class="col-lg-5">
		                                                    <div class="form-group align-items-center justify-content-center">
		                                                        <span class="preview-title overline-title">
		                                                        	@if ($user->list_action === 'oui')
		                                                        	<a class="btn btn-sm btn-success">
		                                                                <em class="icon ni ni-check"></em>
		                                                            </a>
		                                                            @endif
		                                                            @if ($user->list_action === 'non')
		                                                            <a class="btn btn-sm btn-danger">
		                                                                <em class="icon ni ni-cross"></em>
		                                                            </a>
		                                                            @endif
		                                                            Liste des Actions
		                                                        </span>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
	@endforeach

@endsection
