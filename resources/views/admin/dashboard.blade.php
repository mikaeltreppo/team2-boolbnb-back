@extends('layouts.admin')
@section('content')


        {{-- Top Container --}}
        <div class="row align-items-center text-center text-lg-start mb-5">

            {{-- Heading --}}
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                <h1 class="fw-lighter mb-1">Bentornato, <span class="fw-bold font-primary">{{ Auth::user()->name }}</span></h1>
                <p>Questa è la tua dashboard, una panoramica dei tuoi annunci</p>
            </div>
            {{-- End Heading --}}

            {{-- Sponsorsip Banner --}}
            <div class="col-12 col-lg-6">
                <div class="card ms-bg-light rounded-4 border-0">
                    <div class="card-body">
                       <div class="row align-items-center">
                            <div class="col-12 col-xl-1 col-lg-12 text-center text-xl-start text-muted ">
                                <div class="rounded-icon animated mx-auto ms-bg-dark">
                                    <i class="fa-solid fa-ranking-star mb-3 mb-lg-0"></i>
                                </div>
                            </div>

                            <div class="col-12 col-xl-7 col-lg-12 text-center text-xl-start text-muted ps-xl-3 ps-0">
                                <div class="small">Sapevi che un annuncio sponsorizzato viene visualizzato in media <span class="fw-bold">3 volte di più</span> rispetto ad un annuncio classico?</div>
                            </div>

                            <div class="col-xl-4 col-12 text-lg-end text-center">
                                <a href="{{ route('admin.sponsorships.index') }}" class="btn ms-btn ms-btn-sm ms-btn-primary">
                                    <i class="fa-solid fa-star me-2"></i>
                                    Sponsorizza
                                </a>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
            {{-- End Sponsorship Banner --}}

        </div>
        {{-- End Top Container --}}

        <div class="row">


            <div class="col-lg-4 col-12">
                
                {{-- Messages --}}
                    <a href="{{ route('admin.messages.index') }}" class="text-decoration-none">
                        <div class="card card-tile drop-shadow-md mb-4 py-3 bg-white rounded-4 flat-shadow">
                            <div class="card-body position-relative">
                            <div class="row align-items-center text-center text-lg-start g-0">
        
                            <div class="col-12 col-xl-2 text-center order-3 order-lg-0">
                                    <h1 class="fw-bolder">{{$messages_count}}</h1>
                            </div>
        
                                <div class="col-12 col-xl-7 col-lg-12 text-center text-xl-start order-1 text-muted ">
                                    <div class="small mb-2 mb-xl-0">
                                        Messaggi
                                        <br/>
                                        Non letti
                                    </div>
                                </div>
        
                                <div class="col-12 col-xl-3 text-center order-0 order-lg-3 text-muted">
                                    <div class="rounded-icon animated mx-auto bg-success">
                                        <i class="fa-solid fa-envelope mb-3 mb-lg-0"></i>
                                    </div>
                                </div>
                            </div>
        
                            
                            </div>
                        </div>
                    </a>
                  {{-- End Messages --}}

                  {{-- Views --}}
                   <a href="{{ route('admin.apartments.index') }}" class="text-decoration-none">
                    <div class="card card-tile drop-shadow-md mb-4 py-3 bg-white rounded-4 flat-shadow">
                        <div class="card-body position-relative">

                        <div class="row align-items-center text-center text-lg-start  g-0">

                            <div class="col-12 col-xl-2 text-center order-3 order-lg-0">
                                    <h1 class="fw-bolder">12</h1>
                            </div>

                            <div class="col-12 col-xl-7 col-lg-12 text-center text-xl-start order-1 text-muted">
                                Persone hanno visto
                                <br/>
                                i tuoi appartamenti
                            </div>

                            <div class="col-12 col-xl-3 text-center order-0 order-lg-3 text-muted">
                                <div class="rounded-icon animated mx-auto bg-primary">
                                    <i class="fa-solid fa-eye mb-3 mb-lg-0"></i>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                   </a>
                  {{-- End Views --}}

                    {{-- Aparmtents --}}
                    <a href="{{ route('admin.apartments.index') }}" class="text-decoration-none">
                        <div class="card card-tile drop-shadow-md py-3 bg-white rounded-4 flat-shadow">

                            <div class="card-body position-relative">

                            <div class="row align-items-center text-center text-lg-start g-0">

                                <div class="col-xl-2 col-12 text-center order-3 order-lg-0">
                                        <h1 class="fw-bolder">{{$apartment_count}}</h1>
                                </div>

                                <div class="col-12 col-xl-7 col-lg-12 text-center text-xl-start order-1 text-muted ">
                                    Appartamenti
                                    <br/>
                                    pubblicati
                                </div>

                                <div class="col-xl-3 col-12 text-center order-0 order-lg-3 text-muted">
                                    <div class="rounded-icon animated mx-auto bg-warning">
                                        <i class="fa-solid fa-house mb-3 mb-lg-0"></i>
                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>
                    </a>
                    {{-- End Aparmtents --}}
            </div>
           {{-- Graph --}}
            <div class="col-xl-5 col-lg-8 col-12">
                <div class="card h-100 bg-white rounded-4 flat-shadow card-tile drop-shadow-md">
                    <div class="card-body p-4">
                        <span class="small fw-bold">Statistiche Globali</span>
                        <canvas id="myChart" class="mt-3">
                            
                        </canvas>
                    </div>
                </div>
             </div>
             {{-- End Graph --}}

             <div class="col-xl-3 col-lg-12 col-12">
                <div class="card h-100 bg-white rounded-4 flat-shadow card-tile drop-shadow-md">
                    <div class="card-body p-3">
                        <span class="small fw-bold">Altro?</span>
                    </div>
                </div>
             </div>

        </div>
        {{-- End Main Container --}}

@endsection
