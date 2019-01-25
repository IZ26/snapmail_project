@extends('layouts.default')

@section('content')
    <div class="columns is-mobile">
        <div class="column is-half is-offset-one-quarter">
            <section class="section">
                <h1 class="title is-1 has-text-centered has-text-danger">Envoi un message</h1>
                <form method="post" action="/send">
                    {{csrf_field()}}
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input is-primary" name="email" type="text" placeholder="Mail">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Message</label>
                        <div class="control">
                            <textarea class="textarea is-primary" name="message" placeholder="Entrez votre message"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control has-text-centered">
                            <button type="submit" class="button is-primary">Envoyer</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
