@extends('frontend::layouts.master')
@section('title', $page[getValueByLang('page_title_')])
@section('content')
    @include('frontend::inc.banner', ['data' => $page[getValueByLang('page_title_')]])
    <section class="main_content">
        <div class="container business_box works_box">
            <h4 class="works_h4">Public and Cultural Facilities</h4>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image1.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Ishikawa Ongakudo, Ishikawa Pref.</h5>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image2.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Ishikawa Ongakudo, Ishikawa Pref.</h5>
                        </div>
                </div>

            </div>
        </div>
        <div class="container business_box works_box">
            <h4 class="works_h4">Educational Facilities</h4>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image3.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Kanazawa University Library (Kakuma II), Ishikawa Pref.</h5>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image4.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Graduate School of Information Sciences, Tohoku University, Miyagi Pref.</h5>
                        </div>
                </div>

            </div>
        </div>
        <div class="container business_box works_box">
            <h4 class="works_h4">Medical Facilities</h4>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image5.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Kanazawa Medical University Hospital, Ishikawa Pref.
                            </h5>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image6.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Saiseikai Takaoka Hospital, Toyama Pref.</h5>
                        </div>
                </div>

            </div>
        </div>
        <div class="container business_box works_box">
            <h4 class="works_h4">Production Facilities</h4>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image7.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>The Niigata Nippo Co., Ltd., Kurosaki Head Office, Niigata Pref.</h5>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image8.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Tateyama Pharmaceutical Factory Co., Ltd., Toyama Prf.</h5>
                        </div>
                </div>

            </div>
        </div>
        <div class="container business_box works_box">
            <h4 class="works_h4">Commercial and Distribution Facilities</h4>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image9.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Musashi-ga-tsuji Redevelopment Project (Omicho Ichiba-kan), Ishikawa Pref.</h5>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image10.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>AEON Lake Town kaze, Saitama Pref.</h5>
                        </div>
                </div>

            </div>
        </div>
        <div class="container business_box works_box">
            <h4 class="works_h4">Hotels</h4>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image11.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Kagaya group: Setsugetsuka, Nagisa-tei and Aeno-kaze, Ishikawa Pref.</h5>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image12.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Hotel Senkei “Kao”, Niigata Pref.</h5>
                        </div>
                </div>

            </div>
        </div>
        <div class="container business_box works_box">
            <h4 class="works_h4">Cooling/ Distribution Systems</h4>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">
                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image13.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>JA Ishikawa Low-temperature Rice Warehouse, Ishikawa Pref.</h5>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-6 item_solution_box">

                        <div class="box_solution">
                            <div class="item_img_solution_box">
                                <img class="img-fluid" src="{{asset('static/frontend')}}/images/image14.png">
                            </div>
                        </div>
                        <div class="container_tittle">
                            <h5>Kanakan Inc. (Freezers, refrigerators, air cooling equipment), Ishikawa Pref.</h5>
                        </div>
                </div>

            </div>
        </div>

    </section>

@endsection
@section('after_script')

@endsection
