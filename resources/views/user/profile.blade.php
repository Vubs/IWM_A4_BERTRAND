@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-12">
                        <p>Username: {{ $user->name }} </p>
                        <p>addresse email: {{ $user->email }}</p>
                    </div>


                    @if($address)
                        <div class="col-md-12">
                            <h2>Addresse :</h2>
                            <p>Rue : {{ $address->address_line_1 }}</p>
                            <p>Complément : {{ $address->address_line_2 }}</p>
                            <p>Code postal : {{ $address->zipcode }}</p>
                            <p>Pays : {{ $address->state }}</p>
                            <p>Ville : {{ $address->city }}</p>

                        </div>
                    @else
                        <a href="{{ route('add-address') }}" class="btn btn-primary">Ajouter une addresse</a>
                    @endif

                </div>

            </div>
        </div>
    </div>

@endsection