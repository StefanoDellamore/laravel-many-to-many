@extends('layouts.app')

@section('page-title', 'Tutti i tipi di tecnlogia')

@section('main-content')
    <section id="index-admin">
        
        <div id="add">
            <a href="{{ route('admin.technologys.create') }}" class="btn btn-warning mb-3">
                Aggiungi
            </a>
        </div>

        <div class="row">
            @foreach ($technologys as $singleTechnology)
                <div class="col-12 col-xs-6 col-sm-4 col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">
                                {{ $singleTechnology->title }}
                            </h3>

                            <div class="edit-buttons-container d-flex justify-content-between">

                                <a href="{{ route('admin.technologys.show', ['technology' => $singleTechnology->slug]) }}" class="btn btn-primary">
                                    Mostra
                                </a>

                                <form
                                onsubmit="return confirm('Sicuro di voler eliminare questo elemento ? ...')"
                                action="{{ route('admin.technologys.destroy', ['technology' => $singleTechnology->slug]) }}"
                                method="POST"
                                class="d-inline-block">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                                
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection