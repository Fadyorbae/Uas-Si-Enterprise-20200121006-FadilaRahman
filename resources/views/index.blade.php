@extends('layouts.app')

@section('title', 'Wellcome')

@section('content')

    <main id="main" class="main">
        <div class="container">
            <div class="pagetitle">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section dashboard" style="height: 65vh;">
                <div class="row">
                    <div class="d-flex m-auto align-middle">
                        <h1>Wellcome</h1>
                    </div>

                </div>
            </section>
        </div>
    </main><!-- End #main -->
@endsection
