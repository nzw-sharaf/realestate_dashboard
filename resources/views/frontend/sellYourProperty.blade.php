@extends('frontend.layout.master')
@if ($pagemeta)
    @section('title', $pagemeta->meta_title)
    @section('pageDescription', $pagemeta->meta_description)
    @section('pageKeyword', $pagemeta->meta_keywords)
@else
    @section('title',  'Sell Your Property | '.$name)
    @section('pageDescription', $website_description)
    @section('pageKeyword', $website_keyword)
@endif
@section('content')
    {{-- main banner --}}
    <section class="mainBg" id="home" style="background:#0e1c2c;min-height:92px !important;">
    </section>

    {{-- search & breadcrumps --}}
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="d-flex justify-content-start">
                                <ul class="breadcrumbBlue ps-0">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a>Sell Your Property</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row ">
                <div class="col-12 col-lg-12">
                    <div class="row g-3 justify-content-center">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="text-start">
                                <div class="mb-3">
                                    <h4 class="text-primary">Why Sell Your Property With Us?</h4>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-start mb-3">
                                        <div class="me-3">
                                            <i class="text-primary bi bi-check2-circle fa-4x"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Sell Expertise and Experience </h5>
                                            <p class="mb-0 fs-14"> 
                                                Unique Properties brings a wealth of expertise and experience to the table. Our team of skilled professionals understands the intricacies of the real estate market and has a deep understanding of current trends and pricing strategies. With our knowledge and guidance, you can confidently navigate the selling process and maximize the value of your property. 
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-3">
                                        <div class="me-3">
                                            <i class="text-primary bi bi-check2-circle fa-4x"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Extensive Network and Marketing Reach </h5>
                                            <p class="mb-0 fs-14"> 
                                                You gain access to our extensive network of potential buyers, investors, and contacts as we leverage our strong relationships and utilize a comprehensive marketing strategy to ensure maximum exposure for your property. From online listings and social media campaigns to traditional advertising channels, we leave no stone unturned in reaching qualified buyers.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-3">
                                        <div class="me-3">
                                            <i class="text-primary bi bi-check2-circle fa-4x"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Tailored Marketing Approach </h5>
                                            <p class="mb-0 fs-14"> 
                                                At Unique Properties, we believe that each property is unique, and therefore, we tailor our marketing approach to showcase its distinctive features and appeal to the target audience. Our team crafts compelling property descriptions, high-quality visuals, and virtual tours to highlight the selling points of your property. We work closely with you to understand your goals and create a personalized marketing strategy that sets your property apart from the competition.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-start mb-3">
                                        <div class="me-3">
                                            <i class="text-primary bi bi-check2-circle fa-4x"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0">Seamless Selling Process</h5>
                                            <p class="mb-0 fs-14"> 
                                                Selling a property can be a complex and time-consuming endeavor. However, with Unique Property by your side, you can expect a seamless selling process. We handle all aspects, from property valuations and negotiations to legal documentation and closing procedures. Our dedicated team is committed to providing you with a smooth and hassle-free experience, ensuring that you can focus on your next chapter while we take care of the details.
                                            </p>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 p-2">
                            <div class="p-3 p-lg-5 p-md-5 bg-white shadow">
                                <div>
                                    <h4 class="text-primary">
                                        Schedule a call with our property consultants
                                    </h4>
                                </div>
                                <form action="{{route('valuationForm')}}" method="post">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12 col-lg-12 col-md-12">
                                          <input type="text" class="form-control form-control-lg bg-lightBlue fs-14"  name="name"
                                          id="name" placeholder="Your Full Name*" required >
                                          <input type="hidden" name="formName" value="Sell your property Form">
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                          <input type="email" name="email" id="email" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Your Email*" required>
                                        </div>
                                        <div class="col-md-12">
                                            <input id="fullNumber" type="hidden" name="fullNumber">
                                            <input type="tel"  onkeyup="numbersOnly(this)" class="form-control form-control-lg bg-lightBlue fs-14" id="telephone"
                                                name="phone" placeholder="Mobile*" required>
    
                                        </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <select name="property_type" id="property_type" class="form-select form-select-lg bg-lightBlue fs-14" required>
                                                <option value="">Property Type*</option>
                                                <option value="Apartment">Apartment</option>
                                                <option value="Villa">Villa</option>
                                                <option value="Townhouse">Townhouse</option>
                                                <option value="Office">Office</option>
                                                <option value="Retail">Retail</option>
                                                <option value="Building">Building</option>
                                                <option value="Other (Residential)">Other (Residential)</option>
                                                <option value="Other (Commercial)">Other (Commercial)</option>
                                            </select>
                                          </div>
                                          <div class="col-12 col-lg-12 col-md-12">
                                            <input type="text" name="location" id="location" class="form-control form-control-lg bg-lightBlue fs-14" placeholder="Location*" required>
                                          </div>
                                        <div class="col-12 col-lg-12 col-md-12">
                                            <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
                                        </div>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      {{-- Contact --}}
      <section class="my-5 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-md-12">
                    <div class="bg-lightBlue p-3 p-md-3 p-lg-5">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6 my-auto">
                                <div class="secHead text-center text-lg-start text-md-start"> 
                                    <h4 class="text-primary fw-semibold mb-0">Have a question?</h4>
                                    <h4 class="text-primary fw-semibold">Our team is happy to assist you</h4>
                                </div>
                            </div>
                            <div class="col-12 col-lg-5 col-md-5 my-auto">
                                <div class="d-block d-lg-flex d-md-block text-center justify-content-center">
                                    <div class="my-auto me-3 py-2"><button
                                        class="btn btn-primary rounded-pill px-5"   data-bs-toggle="modal"
                                        data-bs-target="#EnquireNowModal">Enquire Now</button></div>
                                    <div class="my-auto py-2">or <span class="fw-semibold">Call: </span><a href="tel:{{ $telephone_number ? $telephone_number : '+97144558888'}}" class="text-decoration-none text-dark">{{ $telephone_number ? $telephone_number : '+971 4 455 8888'}}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
