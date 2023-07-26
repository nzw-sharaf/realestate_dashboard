@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title', 'Floorplans | ' . $name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home"
        style="background:url('{{ $pagemeta ? ($pagemeta->bannerImage ? $pagemeta->bannerImage : asset('frontend/assets/images/banner/homeBg.webp')) : asset('frontend/assets/images/banner/homeBg.webp') }}');min-height:60vh;justify-content:end;padding-top:100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-md-11">
                    <div class="row pt-5">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="secHead text-center">
                                <h2 class="text-white">Floor Plans</h2>
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="breadcrumb">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Floor Plans</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Floorplans  --}}
    <section class="my-5" id="features">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row g-3">

                        @foreach ($floorplans as $key => $floorplanAll)
                            {{-- @dd($floorplanAll) --}}
                            @php
                                $community = App\Models\Community::where('id', $key)->first();
                            @endphp
                            <div class="col-12 col-lg-6 col-md-6">
                                <div class="bg-lightBlue h-100 rounded-3">

                                    <div class="">
                                        <div class="p-3 bg-lightOlive">
                                            <div class="">
                                                <h6 class="text-primary mb-0 text-capitalize">
                                                    {{ $community->name }}</h6>
                                                <small>{{ count($floorplanAll) }}</small>
                                            </div>
                                        </div>
                                        <div class="py-3 pe-2">
                                            <div class="d-flex align-items-start">
                                                <ul class="nav w-fit-content flex-column subcommunityTab nav-pills me-3"
                                                    id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    @php
                                                        $floorplanSubCommunity = $floorplanAll->groupBy('sub_community_id');
                                                        
                                                    @endphp

                                                    @foreach ($floorplanSubCommunity as $key => $subcommunity)
                                                        @foreach ($subcommunity as $item)
                                                            @if ($item->subCommunity)
                                                                <li class="nav-link  cursor-pointer @if ($loop->parent->first) active @endif"
                                                                    id="v-pills-{{ Str::slug($item->subCommunity->name) }}-tab"
                                                                    data-bs-toggle="pill"
                                                                    data-bs-target="#v-pills-{{ Str::slug($item->subCommunity->name) }}"
                                                                    role="tab"
                                                                    aria-controls="v-pills-{{ Str::slug($item->subCommunity->name) }}"
                                                                    aria-selected="true">{{ $item->subCommunity->name }}
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </ul>

                                                <div class="tab-content" id="v-pills-tabContent">
                                                    @foreach ($floorplanSubCommunity as $subcommunity)
                                                        @foreach ($subcommunity as $item)
                                                            @if ($item->subCommunity)
                                                                <div class="tab-pane fade @if ($loop->parent->first) show active @endif"
                                                                    id="v-pills-{{ Str::slug($item->subCommunity->name) }}"
                                                                    role="tabpanel"
                                                                    aria-labelledby="v-pills-{{ Str::slug($item->subCommunity->name) }}-tab"
                                                                    tabindex="0">
                                                                    <div class="keyProFloor">
                                                                        <ul class="listMarker ps-0">
                                                                            <li
                                                                                class="borderBottomLst border-bottom p-2 h-100">
                                                                                <div>
                                                                                    <div class="">

                                                                                        <a href="#"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#applyFloorPlan_{{ $item->id }}"
                                                                                            class="text-decoration-none fs-13 text-black">{{ $item->title }}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="keyProFloor">
                                                                    <ul class="listMarker ps-0">
                                                                        <li class="borderBottomLst border-bottom p-2 h-100">
                                                                            <div>
                                                                                <div class="">

                                                                                    <a href="#" data-bs-toggle="modal"
                                                                                        data-bs-target="#applyFloorPlan_{{ $item->id }}"
                                                                                        class="text-decoration-none fs-13 text-black">{{ $item->title }}</a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Book Viewing modal -->
    @foreach ($floorplans as $key => $floorplanAll)
        @php  $floorplanSubCommunity = $floorplanAll->groupBy('sub_community_id'); @endphp
        @foreach ($floorplanSubCommunity as $subcommunity)
            @foreach ($subcommunity as $item)
                <div class="modal fade" id="applyFloorPlan_{{ $item->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content bg-primary">
                            <div class="modal-header border-0 bg-primaryLight justify-content-center">
                                <button type="button" class="bg-transparent border-0" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="bi bi-x-circle text-white fa-2x"></i></button>
                            </div>
                            <div class="modal-body d-flex flex-column justify-content-center">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div class="secHead text-center mb-3">
                                            <h2 class="text-white text-uppercase">Share Your Information With Us</h2>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5 col-md-5">
                                        <div class="modalViewFormCont">
                                            <form action="{{ route('floorPlanForm') }}" id="modalViewForm" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $item->floorPlanFile }}"
                                                    name="floorPlanFile">
                                                <div class="row g-3">
                                                    <div class="col-md-12">
                                                        <label for="name" class="form-label">Full
                                                            Name*</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Full Name*" required>
                                                        <input type="hidden" class="form-control" id="formName"
                                                            name="formName" value="FloorPlan Form">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="email" class="form-label">Email*</label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" placeholder="Email*" required>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="mobile" class="form-label">Mobile*</label>
                                                        <input id="fullNumber4" type="hidden" name="fullNumbe">
                                                        <input type="tel" class="form-control contField" onkeyup="numbersOnly(this)"
                                                            id="telephone4" name="phone" placeholder="Mobile*" required>

                                                    </div>

                                                    
                                                    <div class="col-md-12">
                                                        <div class="d-grid ">
                                                            <button type="submit"
                                                                class="btn btn-lightBlue text-uppercase">Submit
                                                                Details</button>
                                                        </div>
                                                        <div class="form-text text-white text-center">By clicking submit,
                                                            you agree to
                                                            our Terms & Privacy Policy</div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    @endforeach
@endsection
