@extends('layouts.admin')

@section('content')
    <div>

        <h1 class="text-center">I miei appartamenti</h1>
        <p class="text-center mb-5">Qui puoi gestire i tuoi appartamenti.</p>

        <div class="row flex-wrap gy-4">

            {{-- card add --}}
            <div class="col-lg-3 col-md-6 col-sm-12 ">

                <a href="{{ route('admin.apartments.create') }}" class="card ms_card ms_btn_add flat-shadow">
                    <div class="ms_box_info">
                        <i class="fa-solid fa-circle-info"></i>
                        <div class="ms_speech ms_bottom ms_info">Aggiungi un appartamento</div>
                    </div>

                    <div class="d-flex align-items-center justify-content-center h-100">
                        <i class="fa-solid fa-square-plus"></i>
                    </div>
                </a>
            </div>

            {{-- fine card add --}}

            {{-- card apartment --}}

            @foreach ($apartments as $apartment)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="p-0 card ms_card card-tile drop-shadow-sm bg-white rounded-4 flat-shadow">
                        <a href="{{ route('admin.apartments.show', ['apartment' => $apartment->id]) }}">
                            @if ($apartment->cover_image)
                                <img src="{{ asset('storage/' . $apartment->cover_image) }}" class="card-img-top @if($apartment->visible == 0)? ms_img_grayscale :''@endif"
                                    alt="{{ $apartment->title }}">
                            @endif

                            @if ($apartment->visible == 0)
                            <div class="position-absolute top-0 end-0 d-flex align-items-center mt-1 me-1 ms_black_text">
                                <i class="fa-solid fa-eye-slash me-1"></i>
                                <small>Non visibile</small>
                            </div>
                            @endif
                        </a>

                        <div class="card-body">
                            <h5 class="card-title fs-5 font-semibold">{{ $apartment->title }}</h5>
                            <div class="d-flex">
                                    <i class="fa-solid fa-location-dot ms_light_gray_text me-2 mt-1"></i>
                                    <span class="card-text" >

                                {{ $apartment->address}}


                                </span>
                            </div>
                            

                            <div class="d-flex mt-2 justify-content-between">
                                <div class="card-text">
                                    <span class="fw-bold ">{{ $apartment->price }}</span> €/notte
                                </div>
                                <div class="card-text">
                                    <i class="fa-solid fa-house ms_light_gray_text me-1 "></i>
                                    {{-- <i class="fa-solid fa-ruler-combined ms_light_gray_text me-1 "></i> --}}
                                    <span class="fw-bold ">{{ $apartment->size_m2 }}</span> m<sup>2</sup>
                                </div>
                            </div>
                            {{-- buttons --}}
                            <div class="d-flex position-absolute mb-2 bottom-0 start-0 justify-content-between w-100">
                                <a href="#" class="btn ms-btn ms-btn-sm ms-btn-premium ms-2"><i
                                        class="fa-solid fa-star me-2"></i>Sponsorizza</a>
                                <div class="me-2 d-flex gap-2">
                                    <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->id]) }}" class="btn ms-btn-sm ms-btn-outline-primary">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                        
                                    {{-- delete form --}}
                                    <form class="form_delete_post" method="POST" action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn ms-btn-sm ms-btn-outline-black">
                                            <i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                            {{-- end buttons --}}
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- end card apartment --}}

        </div>

    </div>

  

@endsection



