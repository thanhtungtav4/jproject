@extends('frontend::layouts.master')
@section('title', $page[getValueByLang('page_title_')])
@section('content')
    @include('frontend::inc.banner', ['data' => $page[getValueByLang('page_title_')]])
    <section class="main_content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <strong class="profile_title">Maintenance</strong>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#maintenance">Maintenance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#contractdetails">Contract Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#contractprocessflow">Contract Process Flow</a>
                        </li>

                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div id="maintenance" class="container tab-pane active">
                            <div class="row">
                                <h4 class="title-h1">Maintenance</h4>
                                <section>
                                    <figure class="tCenter mgB2L"><img src="{{asset('static/frontend')}}/images/f_maintenance_01.jpg" alt="Do you have a “regular doctor” for your buildings?"></figure>

                                    <section>
                                        <div class="areaMainte">
                                            <h4 id="tAttentionMainteEn">If you neglect even a minor failure, environmental deterioration could ensue.</h4>
                                            <ul class="list mgBM">
                                                <li>Just like human bodies, buildings will be in worse shape as time goes by.</li>
                                                <li>Just as people see a doctor when they get ill, buildings in poor condition need proper maintenance.</li>
                                                <li>To prevent the illness from becoming serious, regular check-ups are crucial.</li>
                                            </ul>
                                        </div>
                                    </section>

                                    <figure class="tCenter mgB2L"><img src="{{asset('static/frontend')}}/images/f_maintenance_02.jpg" alt="RYOKI is there for your buildings."></figure>

                                    <section>
                                        <div class="areaMainte">
                                            <h4 id="tAfterMainteEn">Just like your family doctor, we take care of your buildings’ health.</h4>
                                            <br>
                                            <p class="mgBM tCenter">Regular inspections keep the maintenance cost low, ensure a comfortable environment, and prevent property values from decreasing.</p>
                                            <p class="mgB4L tCenter">
                                                <img src="{{asset('static/frontend')}}/images/f_ecolution.gif" alt="ECO LUTION" width="190" height="44" id="imgEco"></p>
                                        </div>
                                    </section>
                                </section>
                                <section>
                                    <h2 class="h2">Maintenance Details</h2>
                                    <section>
                                        <h3 class="copyMainEn">We ensure a comfortable environment with our reliable technology and quick response.</h3>
                                        <p class="mgB2L">The lifespan of building equipment such as air conditioners and water supply and drainage systems depends on the conditions in which the equipment is installed or used, and on the natural conditions. Not only does it cost more to repair after a failure, but also it shortens the life of the building. Our appropriate maintenance services help prevent a contingent failure and lengthen the buildings’ lifespan, so you can use your equipment without any worry.</p>

                                        <ul id="naiyo" class="mgB2L">
                                            <li id="colNum01"><span id="number01" class="number">1</span>Air Conditioning
                                                <br>
                                                <span class="txtNaiyoEn">Running, maintaining and repairing of equipment</span>
                                                <ul class="list">
                                                    <li>Appropriate running, maintaining and repairing of the air conditioning system for the purpose of the building</li>
                                                    <li>Maintenance and repair of air conditioning systems and heat source equipment, cold/hot water generators, freezing machines, turbo refrigerators, cooling towers, chilling machines, various pumps, blowers, boilers, non-pressure water heaters, vacuum-type water heaters, once-through boilers, warm air heaters, individual-package air conditioners (air/water cooling), multiple-package air conditioning systems, gas heat pump air conditioning units, fan coil units, total heat exchangers, automatic control equipment</li>
                                                    <li>Maintenance of air conditioning systems that require high accuracy, such as those used for clean rooms</li>
                                                </ul>
                                            </li>
                                            <li id="colNum02"><span id="number02" class="number">2</span>Water Supply, Drainage and Sanitation
                                                <br>
                                                <span class="txtNaiyoEn">Running, maintaining and repairing of equipment</span>
                                                <ul class="list">
                                                    <li>Sanitary maintenance of water/sewage and gas supply equipment</li>
                                                    <li>Maintenance and repair of sanitary facilities and equipment, cleaning of water storage / blackwater / greywater tanks, hot water boilers, electric water heaters, various pumps, pressurization water supply units and gas appliances</li>
                                                </ul>
                                            </li>
                                            <li id="colNum03" class="mgBM"><span id="number03" class="number">3</span>Freezing and Intermediate Temperature Control
                                                <br>
                                                <span class="txtNaiyoEn">Running, maintaining and repairing of equipment</span></li>
                                            <li id="colNum04"><span id="number04" class="number">4</span>Disaster Prevention
                                                <br>
                                                <span class="txtNaiyoEn">Running, maintaining and repairing of equipment</span></li>
                                        </ul>

                                        <section>
                                            <h4>Other Services: Legal Inspections for Various Types of Equipment</h4>
                                            <ul class="list">
                                                <li>Scheduled inspections of building equipment, flue gas smoke extraction / ventilation</li>
                                                <li>Underground oil tank equipment leak tests</li>
                                                <li>Cleaning of drinking water storage tanks (elevated water tanks / water receiving tanks) / water-quality inspection</li>
                                                <li>Boiler performance inspections, etc.</li>
                                            </ul>
                                        </section>
                                    </section>

                                </section>

                            </div>
                        </div>
                        <div id="contractdetails" class="container tab-pane fade">
                            <div class="row">
                                <h4 class="title-h1">Contract Details</h4>
                                <section>
                                    <p class="txtL mgBS"><strong>You can choose plans according to your needs.</strong></p>
                                    <p class="mgBM">Periodic maintenance and repair can not only make your buildings last longer but also keep operation costs lower. We recommend carrying out planned management from the time a building is newly built or renovated, taking into consideration the lifecycle of your buildings. We offer three basic maintenance plans as follows, and custom plans you can choose according to your needs.</p>
                                    <p class="note mgB2L">*Details and fees for maintenance contracts could vary according to contract type or conditions of equipment use, so please ask our branch office or sales office in your area.</p>
                                    <figure class="mgB3L tCenter"><img src="{{asset('static/frontend')}}/images/f_guide_01.gif" alt="Maintenance contract"></figure>

                                    <section>
                                        <h3 id="aPlan">Scheduled inspection contract</h3>
                                        <p class="mgB2L">We carry out regular inspections annually and suggest a preventive maintenance service. Under this contract, you need to pay the cost of the call service (such as initial inspection fee, cost of replacement parts for equipment and replacement work).</p>
                                    </section>

                                    <section>
                                        <h3 id="bPlan">Maintenance and inspection contract</h3>
                                        <aside><img src="{{asset('static/frontend')}}/images/f_guide_02.jpg" alt="" width="130" height="208" class="imgR"></aside>
                                        <p class="mgBM">In addition to two scheduled inspections per year, this contract basically covers the cost of call service to address contingent failures (including initial inspection fee). You can choose maintenance items for individual equipment from our “maintenance list” according to your needs and budget.</p>
                                        <p class="note mgB2L">*Does not cover the cost of replacement parts for equipment or the cost of replacement work.</p>
                                    </section>

                                    <section>
                                        <h3 id="cPlan">Full-maintenance contract</h3>
                                        <p class="mgBM">Covers expenses incurred for call service and all repair costs in the case of contingent failure. You can put building management and cost management in place according to your plan.</p>
                                        <p class="note mgB4L">*Only GHPs (gas engine driven heat pumps) and EHPs (electric heat pumps) with a manufacturers’ warranty are covered by the contract. Contract conditions vary, for example, according to how long the equipment has been used. Please feel free to ask us for more details.</p>
                                    </section>

                                </section>
                                <section>
                                    <h2 class="h2">Advantages of a Maintenance Contract</h2>
                                    <p class="txtL mgBS"><strong>We keep your buildings healthy so that you can have peace of mind when using your equipment.</strong></p>
                                    <p class="mgBL">Periodic inspections help us grasp the condition of the building and take proper maintenance measures. Failure can be prevented. More efficient and economical management of facilities is possible, and leads to the reduction of operation costs with the life cycle of the building in mind.</p>
                                    <figure class="mgB2L tCenter"><img src="{{asset('static/frontend')}}/images/f_guide_03.gif" alt="Advantages of a Maintenance Contract"></figure>
                                    <aside><img src="{{asset('static/frontend')}}images/f_guide_04.jpg" alt="" width="76" height="120" class="imgR"></aside>
                                    <p class="mgB2L">Scheduled maintenance services to meet customers’ needs keep air conditioning systems and other equipment in the best possible condition.
                                        <br> We respond preferentially in the case of contingent failure.</p>

                                    <section>
                                        <h3 class="h3">Customer Feedback</h3>
                                        <section>
                                            <h4 class="h4">Mr. Kitagawa, in charge of equipment management, Kanazawa Shinkin Bank</h4>
                                            <p>Thank you always. Regardless of whether there is an air conditioning system failure or not, we get regular detailed inspections. Our equipment has worked properly without any major trouble since its installation. Regular filter cleaning seems to contribute to improving its economic efficiency and preventing trouble. We look forward to your continued support.</p>
                                        </section>
                                    </section>

                                </section>

                            </div>
                        </div>

                        <div id="contractprocessflow" class="container tab-pane fade">
                            <h4 class="title-h1">Contract Process Flow</h4>
                            <div class="row">
                                <section class="padding_section">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-6">
                                            <div class="item_box">
                                                <div class="step">
                                                    <h6>Step 01</h6>
                                                </div>
                                                <div class="img_box">
                                                    <img class="img-fluid" src="{{asset('static/frontend')}}/images/image_phone.png">
                                                </div>
                                                <div class="content_box">
                                                    <strong>For an estimate</strong>
                                                    <p>Please feel free to ask us by phone or e-mail.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-6">
                                            <div class="item_box">
                                                <div class="step">
                                                    <h6>Step 02</h6>
                                                </div>
                                                <div class="img_box">
                                                    <img class="img-fluid" src="{{asset('static/frontend')}}/images/image_buiding.png">
                                                </div>
                                                <div class="content_box">
                                                    <strong>On-site inspection</strong>
                                                    <p>We will inspect your buildings or equipment on-site and listen to your requests.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-6">
                                            <div class="item_box">
                                                <div class="step">
                                                    <h6>Step 03</h6>
                                                </div>
                                                <div class="img_box">
                                                    <img class="img-fluid" src="{{asset('static/frontend')}}/images/imagenews.png">
                                                </div>
                                                <div class="content_box">
                                                    <strong>Estimate</strong>
                                                    <p>We will give you an estimate for our services in accordance with your requests.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-6">
                                            <div class="item_box">
                                                <div class="step">
                                                    <h6>Step 04</h6>
                                                </div>
                                                <div class="img_box">
                                                    <img class="img-fluid" src="{{asset('static/frontend')}}/images/image_user.png">
                                                </div>
                                                <div class="content_box">
                                                    <strong>Contract</strong>
                                                    <p>If you agree to the estimate we give you, we will draw up a contract.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section>
                                    <h3 class="h3_tittle">If You Are Interested in the Contract</h3>
                                    <ul class="list mgBL list_style_red">
                                        <li>Contact the nearest RYOKI for service fees.</li>
                                        <li>In principle, we carry out contract-based inspections and repair work during regular working hours. You are kindly requested to consult us in advance if you prefer other time slots. 9:00~17:00 (Except for Saturdays, Sundays, public holidays and company holidays)</li>
                                    </ul>

                                </section>
                                <section class="padding_section">
                                    <h3 id="blue_color"><span id="numberx" class="number"><i class="fa fa-map-marker" aria-hidden="true"></i></span>Other Services</h3>
                                    <section>
                                        <h4 id="tIcSpot">Inspection without contract</h4>
                                        <p class="mgBL">Inspection is carried out upon the customer’s request based on our Inspection Manual. The types of inspection we offer are as follows:</p>
                                        <ul class="areaListHalf mgBL clearfix">
                                            <li>
                                                <ul class="list">
                                                    <li>Visual inspection / Filter cleaning</li>
                                                    <li>Operational check</li>
                                                    <li>Replacing and adjusting of periodic replacement parts</li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul class="list">
                                                    <li>Overall inspection and maintenance</li>
                                                    <li>Checking and adjustment of operational conditions</li>
                                                    <li>Legal inspection and other services</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </section>

                                    <section>
                                        <h4 id="blue_color"><span id="numberx" class="number"><img src="{{asset('static/frontend')}}/images/icon-business/phone.png"></span>On-call service</h4>
                                        <p class="mgB4L">Regardless of the presence or absence of a contract, we address problems related to what we have installed.  When something goes wrong with your equipment, please contact and consult our local branch office or sales office.</p>
                                    </section>
                                    <section>
                                        <div class="boxFlow">
                                            <aside id="fBoxFlow"></aside>
                                            <h3 id="blue_color">Construction companies can carry out installation of equipment for new buildings, renovations and maintenance.</h3>
                                            <p class="mgBS">RYOKI is an air conditioning, water supply and drainage systems contractor. We are professional. That is why we can provide meticulous maintenance and repair services to our customers; we are well-versed in each piece of equipment, its accessories, related equipment, and each plumbing pipe behind the wall, under the floor and above the ceiling.</p>
                                            <p>Our services include planning, designing and installing equipment. Moreover, in collaboration with professional groups that offer energy-efficient proposals, we help our customers carry out overall management of their building equipment in accordance with their needs, and reduce expenses with environment-friendly and energy-efficient methods.</p>
                                        </div>
                                    </section>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('after_script')

@endsection
