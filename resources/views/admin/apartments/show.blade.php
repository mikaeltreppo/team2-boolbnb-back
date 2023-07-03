@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-center">

    {{-- inizio big-card apartment --}}
    <div class="card border-0 ms_big_card w-100 mx-lg-5">
       
        {{-- card-top --}}
        <div class="row">

            {{-- col left --}}
            <div class="col col-md-12 col-lg-8 position-relative border-end">
                <div >
                    @if ($apartment->cover_image)
                    <img src="{{ asset('storage/' . $apartment->cover_image) }}" alt="{{ $apartment->title }}" class="card-img-top w-100 img-fluid border-0 d-lg-none">
                    @endif

                </div>
                @if ($apartment->cover_image)
                <img src="{{ asset('storage/' . $apartment->cover_image) }}" alt="{{ $apartment->title }}" class="card-img-top w-100 img-fluid border-0 d-none d-lg-block">
                @endif



                @if($apartment->sponsorships->max('pivot.start_date') < $apartment->sponsorships->max('pivot.expired_at'))
                    <div class="badge ms-bg-dark position-absolute top-0 end-0 mt-lg-2 mt-2 me-lg-4 me-3">
                        <i class="fa-solid fa-star text-light me-2"></i>
                        <span class="xsmall text-uppercase fw-bolder text-light">
                        in evidenza
                        </span>
                    </div>
                @else
                    <a href="{{route('admin.sponsorships.index', ['id' => $apartment->id])}}" class="btn ms-btn ms-btn-sm ms-btn-premium position-absolute top-0 end-0 mt-lg-2 mt-2 me-lg-4 me-3">
                        <i class="fa-solid fa-star me-1"></i>
                        Sponsorizza
                    </a>
                @endif

                <a href="{{ route('admin.apartments.index') }}" class="btn ms-btn-outline-primary  ms_arrow_back d-none d-lg-block ms_arrow_back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <a href="{{ route('admin.apartments.index') }}" class="btn ms-btn-outline-primary d-lg-none position-absolute top-0 start-0 mt-2 ms-3">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>

                <div class="mx-3">
                    
                    
                    {{-- image --}}
                    
    
                    <h5 class="card-title fs-2 font-semibold mb-3 mt-4">{{ $apartment->title }}</h5>
                    <p class="card-text">{{ $apartment->description }}</p>#
    
                    {{-- caratteristiche --}}
                    <div class="my-5 ">
                        <h3 class="font-primary border-bottom pb-2 fs-4 mb-4">Caratteristiche stanze</h3>
                        <div class="row justify-content-center ">
                            <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-lg-0">
                                <div class="ms_box_feature">
                                    <i class="fa-solid fa-door-open fs-5"></i>
                                    <span>Stanze</span>
                                    <span class="fw-bold">{{ $apartment->bedrooms }}</span>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-lg-0">
                                <div class="ms_box_feature">
                                    <i class="fa-solid fa-bed fs-5"></i>
                                    <span>Letti</span>
                                    <span class="fw-bold">{{ $apartment->beds }}</span>
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-6 col-lg-4 mb-3 mb-lg-0">
                                <div class="ms_box_feature">
                                    <i class="fa-solid fa-restroom fs-5"></i>
                                    <span>Bagni</span>
                                    <span class="fw-bold">{{ $apartment->bathrooms }}</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
    
                    {{-- servizi --}}
                    <div class="my-5">
                        <h3 class="font-primary border-bottom pb-2 fs-4 mb-4">Servizi</h3>
    
                        <div class="row flex-wrap gy-4">
                            @foreach ( $apartment->facilities as $facility)
                            <div class="col-5">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="{{$facility->icon}} fs-5"></i>
                                    <div>{{$facility->name}}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
              
                
            </div> 

            {{-- col right --}}
            <div class="col col-lg-4 col-md-12 d-lg-block">
                {{-- map --}}
                <div class="ms_map">
                    <div id="map-div" >
                     
                    </div>
                </div>

                <div class="mx-3">
                    <div class="card-text mt-5">
                        <i class="fa-solid fa-location-dot ms_light_gray_text me-2 mt-1"></i>
                        <span>
                            {{ $apartment->address}}.
                                {{$apartment->city}}
                        </span>
                    </div>
                    <div class="card-text my-3 ">
                        <i class="fa-solid fa-money-check-dollar ms_light_gray_text me-2"></i>
                        <span class="fw-bold fs-5">{{ $apartment->price }}</span> 
                        <span>€/notte</span>
                    </div>
                    <div class="card-text my-3">
                        <i class="fa-solid fa-ruler-combined ms_light_gray_text me-2"></i>
                        <span class="fw-bold fs-5">{{ $apartment->size_m2 }}</span> 
                        <span>m<sup>2</sup></span>
                    </div>
                     <!-- VISUALIZZAZIONI appartamento -->
                     <div class="card-text my-3 pb-4 border-bottom">
                        <i class="fa-solid fa-eye ms_light_gray_text me-2"></i> 
                        <span class="fw-bold fs-5">{{$apartment->views_count}}</span>
                        <span>views</span>
                    </div>
                    
                    <div class="card-text d-flex align-items-center gap-2 my-4">
                        @if ($apartment->visible == 0)
                        <i class="fa-solid fa-ghost fs-4"></i>
                        <span>Non visibile all'utente</span> 
                        @else
                        <i class="fa-solid fa-face-grin-wide fs-4 text-success"></i>
                        <span>Visibile</span> 
                        @endif
                    </div>
                    <div class="card-text d-flex align-items-center gap-2 pb-4 border-bottom">
                        @if ($apartment->available == 0)
                        <i class="fa-solid fa-square-xmark fs-4"></i>
                        <span>Non disponibile</span> 
                        @else
                        <i class="fa-solid fa-square-check fs-4 ms_text_main_darker"></i>
                        <span>Disponibile</span> 
                        @endif
                    </div>
                    
    
                    {{-- buttons --}}
                    <div class="d-flex flex-column mt-5">
                        <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}"
                        class="btn ms-btn-md ms-btn-outline-primary">
                            <i class="fa-solid fa-pen me-2"></i>Modifica appartamento</a>
    
                        <div class="my-3">oppure</div>
    
                        <form class="form_delete_post mb-5" method="POST" action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="fa-solid fa-trash me-2"></i>Elimina appartamento</button>
                        </form>
                    </div>
                </div>
              

            </div>
            </div>
        </div>
        
    
    {{-- fine big-card apartment --}}

    <script>

            const apiKey = 'ZPskuspkrrcmchd9ut4twltuw96h5bWH';

        function createMap(lat, long) {
                var map = tt.map({
                key: apiKey,

                container: "map-div",

                center: { lng: long, lat: lat },

                zoom: 12,
                });
            }

    </script>
    
@endsection
