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
                            <h4 class="title-h1">About Us1</h4>
                        </div>
                        <div id="offices" class="container tab-pane fade">
                            <h4 class="title-h1">About Us2</h4>
                        </div>
                        <div id="policy" class="container tab-pane fade">
                            <h4 class="title-h1">About Us3</h4>
                        </div>

                    </div>
                </div>
            </div></div>
    </section>
@endsection
@section('after_script')

@endsection
