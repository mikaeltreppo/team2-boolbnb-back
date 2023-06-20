@extends('layouts.admin')

@section('content')

        <div class="row align-items-center text-center text-lg-start ">
            <div class="col-12 col-lg-6">
                <h1 class="fw-lighter mb-4 mb-lg-0">Bentornato, <span class="fw-bold font-primary">Cicciobello</span></h1>
            </div>

            {{-- Sponsorsip Banner --}}
            <div class="col-12 col-lg-6">
                <div class="card bg-light">
                    <div class="card-body">
                       <div class="row align-items-center">
                            <div class="col-lg-10 col-12 order-1 order-lg-0">
                                <div class="small">Hai 3 appartamenti non sponsorizzati</div>
                                <h3>PAGA</h3>
                            </div>
                            <div class="col-lg-2 col-12 text-center order-0 order-lg-1">
                                    <i class="fa-solid fa-money-check-dollar fa-2x text-muted"></i>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
            {{-- Sponsorship Banner --}}
        </div>

        <hr class="my-5">

        <div class="row">
            <div class="col-lg-4 col-12">
                
                {{-- Messages --}}
                <div class="card mb-4 py-3 bg-light">
                    <div class="card-body">
                      <div class="row align-items-center text-center text-lg-start">
                       <div class="col-12 col-xl-3 text-center order-3 order-lg-0">
                            <h1 class="fw-bolder">50</h1>
                       </div>
                        <div class="col-12 col-xl-6 col-lg-12 text-center text-xl-start order-1 ">
                            <span class="mb-2 mb-xl-0">Non Letti</span>
                        </div>
                        <div class="col-12 col-xl-3 text-center order-0 order-lg-3 text-muted">
                            <i class="fa-solid fa-envelope fa-3x mb-3 mb-lg-0"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- End Messages --}}

                  {{-- Views --}}
                    <div class="card mb-4 py-3 bg-light">
                        <div class="card-body">
                        <div class="row align-items-center text-center text-lg-start">
                            <div class="col-12 col-xl-3 text-center order-3 order-lg-0">
                                    <h1 class="fw-bolder">12</h1>
                            </div>
                            <div class="col-12 col-xl-6 col-lg-12 text-center text-xl-start order-1">
                                <span class="mb-2 mb-xl-0">Visualizzazioni</span>
                            </div>
                            <div class="col-12 col-xl-3 text-center order-0 order-lg-3 text-muted">
                                <i class="fa-solid fa-eye fa-3x mb-3 mb-lg-0"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                  {{-- End Views --}}

                    {{-- Aparmtents --}}
                    <div class="card py-3 bg-light">
                            <div class="card-body">
                            <div class="row align-items-center text-center t">
                                <div class="col-xl-3 col-12 text-center order-3 order-lg-0">
                                        <h1 class="fw-bolder">5</h1>
                                </div>
                                <div class="col-12 col-xl-6 col-lg-12 text-center text-xl-start order-1">
                                    <span class="mb-2 mb-xl-0">Appartamenti</span>
                                </div>
                                <div class="col-xl-3 col-12 text-center order-0 order-lg-3 text-muted">
                                    <i class="fa-solid fa-house fa-3x mb-3 mb-lg-0"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    {{-- End Aparmtents --}}
            </div>
           {{-- Map --}}
           <div class="col-lg-8 col-12">
                <div class="card h-100">
                    <div class="card-body p-3">
                        GRAFICO
                    </div>
                </div>
             </div>
             {{-- End Map --}}

        </div>

@endsection
