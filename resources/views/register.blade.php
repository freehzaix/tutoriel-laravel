@extends('layout.app')

@section('title')
    Création d'un compte
@endsection

@section('content')
<!-- content -->
<div class="sub-main-w3">
    <div class="bg-content-w3pvt">
        <div class="top-content-style">
            <img src="/frontend/images/user.jpg" alt="" />
        </div>
        <form action="/register/traitement" method="post">
        @csrf
            <p class="legend">Inscription<span class="fa fa-hand-o-down"></span></p>
            <div class="input">
                <input type="email" placeholder="Email" name="email" required />
                <span class="fa fa-envelope"></span>
            </div>
            <div class="input">
                <input type="password" placeholder="Password" name="password" required />
                <span class="fa fa-unlock"></span>
            </div>
            <div class="input">
                <input type="text" placeholder="Nom" name="nom" required />
                <span class="fa fa-user"></span>
            </div>
            <div class="input">
                <input type="text" placeholder="Prenom" name="prenom" required />
                <span class="fa fa-user"></span>
            </div>
            <button type="submit" class="btn submit">
                <span class="fa fa-sign-in"></span>
            </button>
        </form>

        @if (session('status'))
            <a href="#" class="bottom-text-w3ls"> {{ session('status') }} </a>
        @endif

        <a href="/login" class="bottom-text-w3ls">Déjà un compte ? se connecter.</a>
    </div>
</div>
<!-- //content -->
@endsection
