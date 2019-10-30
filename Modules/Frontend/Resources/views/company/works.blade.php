@extends('frontend::layouts.master')
@section('title', $page[getValueByLang('page_title_')])
@section('content')
    @include('frontend::inc.banner', ['data' => $page[getValueByLang('page_title_')]])
    <section class="main_content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <strong class="profile_title">Corporate Profile</strong>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#about">Corporate Profile &amp; History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#greeting">Greeting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#offices">Offices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#policy">Environmental Policy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div id="about" class="container tab-pane active">
                            <div class="row">
                                <h4 class="title-h1">Corporate Profile</h4>
                                <table class="table table-bordered table-responsive">
                                    <tbody>
                                    <tr>
                                        <td>Business</td>
                                        <td>
                                            <ol>
                                                <li>Design and construction of heating, ventilation, air conditioning (HVAC) systems</li>
                                                <li>Design and construction of water supply, drainage and water filtration systems</li>
                                                <li>Design and construction of disaster-prevention systems</li>
                                                <li>Design and construction of clean rooms</li>
                                                <li>Development and application of our original “RiCS” system</li>
                                                <li>Design and construction of cooling and heating systems and snow melting systems</li>
                                                <li>Construction of photovoltaic power plants</li>
                                            </ol>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Founded</td>
                                        <td>Founded in October 1930</td>

                                    </tr>
                                    <tr>
                                        <td>Incorporated</td>
                                        <td>Incorporated in October 1954</td>
                                    </tr>
                                    <tr>
                                        <td>Capital</td>
                                        <td>9.793 million dollars</td>
                                    </tr>
                                    <tr>
                                        <td>Number of employees</td>
                                        <td>
                                            345 (excluding part time workers)
                                            <dl>
                                                <dt>Engineers and licensed engineers:</dt>
                                                <dd>Doctor of Engineering : 1</dd>
                                                <dd>Professional Engineers: 3</dd>
                                                <dd>1st-class Kenchikushi : 4</dd>
                                                <dd>Level-1 piping construction management engineers: 209</dd>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sales</td>
                                        <td>Masaichiro Kitagawa</td>
                                    </tr>
                                    <tr>
                                        <td>Builder's license number</td>
                                        <td>Licensed by the Minister of Land, Infrastructure and Transport<br>
                                            (S-24) No. 1006 (Plumbing, construction, electric works)<br>
                                            (G-24) No. 1006 (Engineering of fire-fighting systems and equipment installation)</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h4 class="title-h1">History</h4>
                                <p>The establishment of the company dates back to October 1930 when Takichi Nakagawa started the manufacturing and sales of refrigeration equipment. In July 1947, the company joined Kitagawa Kogyo Co., Ltd. (now Kitagawa Hutec Co., Ltd.) as a machinery manufacturing division. It then partnered with Nagoya Machinery Manufacturing Plant of New Mitsubishi Heavy Industries Co., Ltd. (now Mitsubishi Heavy Industries, Ltd.) as a distributor of Mitsubishi Heavy Industries products in October 1949 and developed its business. </p>
                                <p>Subsequently, Ryoki Kogyo Co., Ltd. was established separately from Kitagawa Kogyo Co., Ltd. to focus on the sales of refrigeration equipment and the design and installation of air conditioning equipment.</p>
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <th scope="col">Year</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Oct. 1954</th>
                                        <td>Established Ryoki Kogyo Co., Ltd. in Nishigawa-cho, Kanazawa.<br>
                                            Established the Niigata office (elevated to a branch in February 1963).</td>
                                    </tr>
                                    <tr>
                                        <th>April 1955</th>
                                        <td>Registered as a builder under the Construction Industry Act: (by the Minister of Construction (2) No. 4232)</td>
                                    </tr>
                                    <tr>
                                        <th>April 1956</th>
                                        <td>Established the Toyama office (elevated to a branch in Dec. 1979).<br>
                                            Established the Fukui office (elevated to a branch in April 1983).</td>
                                    </tr>
                                    <tr>
                                        <th>Feb. 1959</th>
                                        <td>Moved the head office to Nakamura-machi (now Mikage-machi).</td>
                                    </tr>
                                    <tr>
                                        <th>June 1965</th>
                                        <td>Established the Sendai office (elevated to a branch in Dec. 1986).</td>
                                    </tr>
                                    <tr>
                                        <th>Dec. 1967</th>
                                        <td>Established the Nagaoka office (elevated to a branch in April 1998).</td>
                                    </tr>
                                    <tr>
                                        <th>May 1973</th>
                                        <td>Received a building license from the Minister of Construction in accordance with the amended Construction Industry Act: (S, G-48) No. 1006.</td>
                                    </tr>
                                    <tr>
                                        <th>March 1980</th>
                                        <td>Established Sanzen Equipment Co., Ltd. as a plumbing company in Mikage-machi, Kanazawa.
                                            <br>
                                            (Investme3nt ratio of our company: 100%) </td>
                                    </tr>
                                    <tr>
                                        <th>Sep. 1983</th>
                                        <td>Established the Nagano office (elevated to a branch in March 1989).</td>
                                    </tr>
                                    <tr>
                                        <th>Feb. 1988</th>
                                        <td>Established the Tokyo office (renamed Tokyo Head Office in March 1992).</td>
                                    </tr>
                                    <tr>
                                        <th>Sep. 2001</th>
                                        <td>Merged a subsidiary, Sanzen Equipment Co., Ltd.</td>
                                    </tr>
                                    <tr>
                                        <th>April 2012</th>
                                        <td>Established Ryoki Holdings Co., Ltd.</td>
                                    </tr>
                                    <tr>
                                        <th>Sep. 2013</th>
                                        <td>Established Ryoki Energy Co., Ltd. and entered the solar power generation business.</td>
                                    </tr>
                                    <tr>
                                        <th>Jan. 2016</th>
                                        <td>Established Ryoki Plant Factory Urasa.LLC and studied the system of plant factory.</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="greeting" class="container tab-pane fade">
                            <h4 class="title-h1">Greeting</h4>
                            <div class="row">
                                <section>
                                    <figure><img src="images/p_president.jpg" alt="Masaichiro Kitagawa President Ryoki Kogyo Co., Ltd." class="imgR"></figure>
                                    <p class="mgBM">We are working to create a comfortable environment by adding life to facilities we have created. The measures we take should be consistent with our policy of cherishing and preserving our precious global environment.</p>
                                    <p class="mgBM">Since its foundation, our company has aimed to create a “comfortable environment” as HVAC system engineering company. Now, we lead comfortable lives, and people’s needs are changing; spiritual satisfaction has become more desirable than material abundance. In designing plants and offices, we have to consider how to incorporate a living environment into a working environment.</p>
                                    <p class="mgBM">As engineers, our mission is to prepare appropriate measures to respond to customers’ needs that are constantly evolving in accordance with societal changes.</p>
                                    <p>We have excellent engineering skills that have been honed over our long history, as well as planning and design capabilities that have developed through our wealth of experience.</p>
                                    <p class="mgBM">We are sincerely grateful for the support our customers have provided for us. We will endeavor to meet their expectations while maintaining our corporate policy of preserving the global environment.</p>
                                    <p class="mgB2L">We appreciate your continued support and patronage.</p>
                                    <dl class="tRight">
                                        <dt class="txt2L">Masaichiro Kitagawa</dt>
                                        <dd>President </dd>
                                        <dd class="txtL">Ryoki Kogyo Co., Ltd.</dd>
                                    </dl>
                                </section>
                            </div>
                        </div>
                        <div id="offices" class="container tab-pane fade">
                            <h4 class="title-h1">Offices</h4>
                            <div class="row">
                                <table class="table table-bordered table-responsive">
                                    <tbody><tr>
                                        <th>Tokyo Main Office</th>
                                        <td>5-chome-1-3 Nishiikebukuro, Toshima, Tokyo 171-0021 Japan<br>
                                            TEL: 81-3-3590-5000  FAX: 81-3-3590-5488</td>
                                        <td class="nowrap"><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=35.728747,139.715881&amp;spn=0.014928,0.017896&amp;iwloc=0005022c4c1b253dcef04" target="_blank">Map</a></td>

                                    </tr>
                                    <tr>
                                        <th>Kanazawa Main Office</th>
                                        <td>10-7 Mikage-machi, Kanazawa 921-8526 Japan<br>
                                            TEL: 81-76-241-1141  FAX: 81-76-244-6888</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=36.564754,136.641748&amp;spn=0.01477,0.017896&amp;iwloc=0005022aa3693bb15e22b" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Kanazawa Branch Office</th>
                                        <td>10-7 Mikage-machi, Kanazawa 921-8526 Japan<br>
                                            TEL: 81-76-280-4000  FAX: 81-76-280-4774</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=36.563203,136.644516&amp;spn=0.014046,0.015578&amp;iwloc=0005057432bda514aefb7" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Niigata Branch Office</th>
                                        <td>3-7-15 Sasaguchi, Chuo, Niigata 950-8740 Japan<br>
                                            TEL: 81-25-245-0221  FAX: 81-25-241-2851</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=37.914358,139.069383&amp;spn=0.014508,0.017896&amp;iwloc=0005022c476debc7600ed" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Toyama Branch Office</th>
                                        <td>2-17-6 Kurosekita-machi, Toyama 939-8216 Japan<br>
                                            TEL: 81-76-420-2700  FAX: 81-76-420-2703</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=36.666354,137.20263&amp;spn=0.01475,0.017896&amp;iwloc=0005022c4b9ebd201bfab" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Sendai Branch Office</th>
                                        <td>5-9-13 Ôgi-machi, Miyagino, Sendai 983-0034 Japan<br>
                                            TEL: 81-22-232-3711  FAX: 81-22-231-9447</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=38.267972,140.952723&amp;spn=0.014438,0.017896&amp;iwloc=0005022c46e84839f2582" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Fukui Branch Office</th>
                                        <td>4-119 Kaihatsu, Fukui 910-0842 Japan<br>
                                            TEL: 81-776-54-4532  FAX: 81-776-53-3201</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=36.083494,136.238258&amp;spn=0.014861,0.017896&amp;iwloc=0005022c49abfe748372f" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Nagaoka Branch Office</th>
                                        <td>2279-27 Kawasaki-machi, Nagaoka, Niigata 940-0861 Japan<br>
                                            TEL: 81-258-31-7500  FAX: 81-258-31-7501</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=37.451133,138.874161&amp;spn=0.014599,0.017896&amp;iwloc=0005022c47313029da275" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Nagano Branch Office</th>
                                        <td>21-5 Ôaza-ishiwatari, Nagano 381-0015 Japan<br>
                                            TEL: 81-26-244-4800  FAX: 81-26-244-7575</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=36.661844,138.240366&amp;spn=0.014751,0.017896&amp;iwloc=0005022c469fdfe28c1ac" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Joetsu Sales Office</th>
                                        <td>3-7-29 Higashishiro-cho, Joetsu 943-0836 Japan<br>
                                            TEL: 81-255-23-4101  FAX: 81-255-24-9247</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=37.109579,138.261652&amp;spn=0.014665,0.017896&amp;iwloc=0005022c512b712531659" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Kaga Sales Office</th>
                                        <td>He-105-1 Kuwabara-machi, Kaga 922-0326 Japan<br>
                                            TEL: 81-761-74-2101  FAX: 81-761-74-7413</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=36.317615,136.380308&amp;spn=0.014817,0.017896&amp;iwloc=0005022c464ba2a2a508f" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Nanao Sales Office</th>
                                        <td>55-1 Koyodai, Nanao 926-0177 Japan<br>
                                            TEL: 81-767-62-2933  FAX: 81-767-62-2934</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=37.083667,136.924367&amp;spn=0.01467,0.017896&amp;iwloc=0005022c45558e5bd35d7" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Takaoka Sales Office</th>
                                        <td>472 Kyoda, Takaoka 933-0874 Japan<br>
                                            TEL: 81-766-21-4156  FAX: 81-766-22-0277</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=36.7302,137.016613&amp;spn=0.014738,0.017896&amp;iwloc=0005022c50c330613c422" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Hakusan Sales Office</th>
                                        <td>FLESIS Bld. 2F, 2015 Kurabe-machi, Hakusan 924-0007 Japan<br>
                                            TEL: 81-76-227-9972  FAX: 81-76-227-9973</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=36.554447,136.553235&amp;spn=0.014772,0.017896&amp;iwloc=0005022c517daa2191453" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Chiba Sales Office</th>
                                        <td>High-bridge Bld. 202, 2-11 Yayoi-cho, Inage, Chiba 263-0022 Japan<br>
                                            TEL: 81-43-445-7110  FAX: 81-43-445-8352</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=35.624704,140.102699&amp;spn=0.014948,0.017896&amp;iwloc=0005022c51e2a2185c581" target="_blank">Map</a></td>
                                    </tr>
                                    <tr>
                                        <th>Morioka Office</th>
                                        <td>Hashiichi Bldg. 3F, 7-17 Morioka-ekimae Kitadori, Morioka, Iwate 020-0033<br>
                                            TEL: 019-601-8520  FAX: 019-601-8521</td>
                                        <td><a href="https://www.google.co.jp/maps/ms?msid=201128902240642241965.0005022aa367f68687a39&amp;msa=0&amp;ll=39.70581, 141.13619" target="_blank">Map</a></td>
                                    </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div id="policy" class="container tab-pane fade">
                            <h4 class="title-h1">Environmental Policy</h4>
                            <div class="row">
                                <section class="magin-top-nt">
                                    <h3 class="h3">Basic Philosophy</h3>
                                    <p class="mgB3L">Because we recognize that architectural facilities have a significant influence on the global environment, we try to decrease the environmental impact of our work, and as members of society, we aim to preserve and improve the environment.</p>
                                </section>
                                <section>
                                    <h3 class="h3">Course of Action</h3>
                                    <img src="images/p_eco.jpg" alt="" width="180" height="240" class="imgR" style="margin-top:6px;">
                                    <ol class="listNumber">
                                        <li>We make proposals for environmental preservation such as resource saving and energy saving in the processes of sale and design of facilities. In the processes of construction and maintenance, we try to preserve the environment, prevent contamination, decrease the number of construction sub-products, promote recycling and appropriately dispose of CFCs (chlorofluorocarbons).</li>
                                        <li>We try to use resources and energy effectively and decrease the amount used.</li>
                                        <li>We comply with environmental acts and government environmental policies, as well as our industry’s action policies that we agree with.</li>
                                        <li>We establish our environmental management system, and set, act, review and constantly improve our environmental targets.</li>
                                        <li>We ensure that all of our employees understand our environmental policies, and provide them with information, training and education. We publicize our environmental policies on our website.</li>
                                    </ol>
                                    <dl class="tRight">
                                        <dt class="txt2L">Masaichiro Kitagawa</dt>
                                        <dd>President </dd>
                                        <dd class="txtL">Ryoki Kogyo Co., Ltd.</dd>
                                    </dl>
                                </section>
                            </div>
                        </div>

                    </div>
                </div>
            </div></div>
    </section>

@endsection
@section('after_script')

@endsection
