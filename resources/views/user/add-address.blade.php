@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2>Addresse :</h2>
                <form action="{{ route('update-address') }}" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="line_1">Rue</label>
                            <input class="form-control" type="text" id="line_1" name="line_1" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="line_2">Complément</label>
                            <input class="form-control" type="text" id="line_2" name="line_2">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="zipcode">Code postal</label>
                            <input class="form-control" type="text" id="zipcode" name="zipcode" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="state">Pays</label>
                            <input class="form-control" type="text" id="state" name="state" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="city">Ville</label>
                            <input class="form-control" type="text" id="city" name="city" required>
                        </div>

                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">Sauvegarder mes infos</button>
                </form>

            </div>


@endsection