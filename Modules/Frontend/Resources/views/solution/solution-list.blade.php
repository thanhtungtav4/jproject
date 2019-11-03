@extends('frontend::layouts.master')
{{--@section('title', $page[getValueByLang('page_title_')])--}}
@section('title', $page[0][getValueByLang('page_sub_title_1_')])
@section('content')
    @include('frontend::inc.banner', ['data' => $page[0][getValueByLang('page_sub_title_1_')]])
    <section class="main_content">
        <div class="container">
            {{--$page[0][getValueByLang('page_sub_title_1_')])--}}
            <div class="row">
                <div class="col-md-3">
                    <strong class="profile_title">{{$page[0][getValueByLang('page_sub_title_1_')]}}</strong>
                    <ul class="nav">
                        <?php $tmp = 0 ?>
                        <?php $category = 0 ?>
                        @foreach($page as $value)
                            @if($tmp == 0)
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tab_{{$value['page_id']}}">{{$value[getValueByLang('page_sub_title_1_')]}}</a>
                                    <?php $tmp = 1 ?>
                                </li>
                            @else
                                @if($value['page_type'] == 'solution-list-child')
                                    @if($category == 0)
                                        <li class="nav-item">
                                            <a class="nav-link {{$value['page_type'] == 'solution-list-child' ? 'child-nav' : ''}}" data-toggle="tab" href="javascript:void(0)">{{__("Tiết kiệm năng lượng hệ thống DHKK của RiCS")}}</a>
                                            <?php $category = 1 ?>
                                        </li>
                                    @endif
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link {{$value['page_type'] == 'solution-list-child' ? 'child-nav' : ''}}" data-toggle="tab" href="#tab_{{$value['page_id']}}">{{$value[getValueByLang('page_sub_title_1_')]}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        {{--{{$page[8]['page_content_1_vi']}}--}}
                        <?php $tmp1 = 0 ?>

                        @foreach($page as $value)
                            @if($tmp1 == 0)
                                <div id="tab_{{$value['page_id']}}" class="container tab-pane active">
                                    {!! $value[getValueByLang('page_content_1_')] !!}
                                </div>
                                <?php $tmp1 = 1 ?>
                            @else
                                <div id="tab_{{$value['page_id']}}" class="container tab-pane fade">
                                    {!! $value[getValueByLang('page_content_1_')] !!}
                                </div>
                                @if (Config::get('app.locale') == 'vi')
                                    <div id="tab_51" class="container tab-pane fade">
                                        <h4 class="title-h1">Nhà Máy Sản Xuất</h4>
                                        <div class="row">
                                            <section>


                                                <section>

                                                    <p class="mgBS">Trong nhà máy sản xuất các điều kiện canh tác như chiếu sáng, nhiệt độ, độ ẩm, carbonic, dinh dưỡng và nước được hệ thống kiểm soát , quanh năm  cho canh tác sản xuất.</p>
                                                    <p class="mgBL">Có hai kiểu nhà máy sản xuất :<br>
                                                        1.    “Chiếu sáng nhân tạo” ở những nơi mà chỉ xử dụng ánh sáng nhân tạo đi kèm với môi trường.<br>
                                                        2.   “Chiếu sáng mặt trời “ ở những nơi mà ánh sáng mặt trời xử dụng chiếu sáng chính và chiếu sáng nhân tạo chỉ để bổ xung,cùng với nhiệt độ mùa hè – kiểm soát kỹ thuật,v,v..(bao gồm nhà máy chiếu sáng mặt trời / nhân tạo)</p>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <figure>
                                                                <img src="/images/p_shokubutsu_01_01.jpg" class="img-fluid" alt="Artificial-light-type plant factory">
                                                                <figcaption>Nhà máy chiếu sáng nhân tạo</figcaption>
                                                            </figure>
                                                        </div>
                                                        <div class="col-6">
                                                            <figure>
                                                                <img src="/images/p_shokubutsu_01_02.jpg" class="img-fluid" alt="Solar-light-type plan factory">
                                                                <figcaption>Nhà máy chiếu sáng mặt trời</figcaption>
                                                            </figure>
                                                        </div>

                                                    </div>
                                                </section>

                                                <section>
                                                    <h3 class="h3">Bên lề Dự án</h3>
                                                    <p class="mgBL">Chúng tôi nghiên cứu và khuyến khích nhà máy sản xuất kết hơp hệ thống DHKK trong mùa đông. Chúng tôi đã và đang phát triển kỹ thuật mới đồng hành với các công ty, các trường đại học, và phát triển kỹ thuật của chúng tôi trong viêc quản lý nhà máy sản xuất.</p>
                                                    <div class="tCenter">
                                                        <figure class="mgB3L">
                                                            <figcaption class="mgBS txtM">Hệ thống Kiểm soát từ xa. </figcaption>
                                                            <img src="/images/p_shokubutsu_02.gif" alt="Remote-control system" width="686" height="514">
                                                        </figure>
                                                    </div>
                                                </section>

                                                <section>
                                                    <h3 class="h3">Ví dụ</h3>
                                                    <div class="row mgB3L">
                                                        <div class="col-6">
                                                            <img src="/images/p_shokubutsu_03_01.jpg" alt="Example1" class="img-fluid">
                                                        </div>
                                                        <div class="col-6">
                                                            <img src="/images/p_shokubutsu_03_02.jpg" alt="Example2" class="img-fluid">
                                                        </div>
                                                        <div class="col-6">
                                                            <img src="/images/p_shokubutsu_03_03.jpg" alt="Example3" class="img-fluid">
                                                        </div>
                                                        <div class="col-6">
                                                            <img src="/images/p_shokubutsu_03_04.jpg" alt="Example4" class="img-fluid">
                                                        </div>
                                                    </div>

                                                    <div class="boxFlow mgB3L tCenter">
                                                        <h4 class="h3txt">Sự kết hợp  tốt nhất của các kiểu năng lương nhà máy <br class="brPc">Niigata ( loại ít tuyết / loại nhiều tuyết )</h4>
                                                        <div class="tCenter"><img src="/images/p_shokubutsu_03_05.png" alt="Artificial-light-type plant factory" class="img-fluid img_center"></div>

                                                    </div>
                                                </section>

                                                <section>
                                                    <h3 class="h3">Trung tâm DKTX</h3>
                                                    <div class="tCenter"><img src="/images/p_shokubutsu_04.png" alt="Remote-control center" class="img-fluid img_center"></div>
                                                </section>

                                                <section>
                                                    <h3 class="h3">Nhà máy sản xuất Uonuma</h3>
                                                    <div class="row"><img src="/images/p_shokubutsu_05.png" alt="Uonuma Plant Factory" class="img-fluid img_center"></div>

                                                </section>
                                            </section>
                                        </div>
                                    </div>
                                    <div id="tab_52" class="container tab-pane fade">
                                        <h4 class="title-h1">Cty Kinh doanh dich vụ Năng Lượng</h4>
                                        <div class="row">
                                            <section>

                                                <p class="mgB2L">Chúng tôi hoạt động đồng hành với ESCO và cung cấp toàn diện dịch vụ tiết kiệm năng lượng.</p>

                                                <section>
                                                    <h3 class="h3">Lợi thế của các dự án ESCO.</h3>
                                                    <ul id="listMerit" class="mgB2L">
                                                        <li><span>1</span>Gía thành của việc xây dựng hệ thống tiết kiệm năng lượng đã làm giảm giá thành các tiện ích.</li>
                                                        <li><span>2</span>Tiết kiệm năng lượng có thể nhận ra  không làm hủy hoại môi trường.</li>
                                                        <li><span>3</span>   Các dịch vụ của ESCO bảo đảm hiệu quả tiết kiệm năng lượng.</li>
                                                        <li><span>4</span>Các dịch vụ tiết kiệm năng lượng được cung cấp toàn diện</li>
                                                    </ul>
                                                    <div class="tCenter">
                                                        <figure class="mgB3L"><img class="img-fluid img_center" src="/images/f_merit.gif" alt="Advantages of ESCO Projects"></figure>
                                                    </div>
                                                </section>

                                                <section>
                                                    <h3 class="h3">Lời đề nghị toàn diện của chúng tôi :</h3>
                                                    <ol class="mgB2L">
                                                        <li>Chẩn đoán việc làm xấu đi môi trường và tiết kiệm năng lượng.</li>
                                                        <li>Kế hoạch, thiết kế và xây dựng cơ sở tiết kiệm năng lượng</li>
                                                        <li>Bảo trì và vận hành quản lý hệ thống tiết kiệm năng lượng (TKNL)</li>
                                                        <li>Đo lường và khẳng định làm giảm năng lượng tiêu thụ.</li>
                                                    </ol>
                                                </section>

                                                <section>
                                                    <h3 class="h3">Ví dụ</h3>
                                                    <ol class="mgB2L">
                                                        <li>Dự án ESCO - Bệnh viện Saiseikai Takaoka thuộc Hiệp Hội Welffare Tổ chức Saiseikai Imperial Gift Founadation </li>
                                                        <li>Dự án Esco- Niigata  City Hall Tỉnh Joetsu </li>
                                                        <li>Dự án ESCO – Thành phố Pario</li>
                                                        <li>Dự án ESCO – Toyama Jiyukan</li>
                                                    </ol>

                                                    <div class="boxSection mgB3L">
                                                        <h3 class="h4">Chúng tôi thuộc về Hiệp Hội Tiết kiệm năng lượng và hệ thống mạng lưới các công ty thuộc Kanazaw Eco-promotion như dưới đây .</h3>
                                                        <ul class="list">
                                                            <li class="mgBM">Hệ thống công ty Kanazawa Eco- promotion website :<br>
                                                                <a href="http://www.kanazawa-eco.net/" target="_blank" class="icLinkPage">http://www.kanazawa-eco.net/</a></li>
                                                            <li>Hiệp hội Các Công ty Năng lượng Nhật bản<br>
                                                                <a href="http://www.jaesco.or.jp/" target="_blank" class="icLinkPage">http://www.jaesco.or.jp/</a></li>
                                                        </ul>
                                                    </div>
                                                </section>
                                            </section>
                                        </div>
                                    </div>
                                    <div id="tab_53" class="container tab-pane fade">
                                        <h4 class="title-h1">Tái tạo Cơ sở / Thiết bị</h4>
                                        <div class="row">
                                            <div id="main"><!-- InstanceBeginEditable name="main" -->
                                                <section>

                                                    <figure class="mgBM"><img src="/images/p_renewal.jpg" class="img-fluid img_center" alt="Renewal of facilities and equipment in response to new social requirements"></figure>
                                                    <p class="mgB3L"><strong>Việc tái tạo cơ sở và thiết bị là câu trả lời cho những yêu cầu mới của xã hội.</strong></p>
                                                    <p class="mgB3L">Chúng tôi cung cấp các giải pháp tiết kiệm năng lượng và bảo vệ môi trường mà các bạn cần.Với sự tiến bộ của Khoa học Kỹ thuật chúng tôi giải đáp cho việc mở rộng kinh doanh, thay thế các thiết bị DHKK cho việc xây dựng lại dự án các tòa nhà. </p>

                                                    <section>
                                                        <h3 class="h3">1.Tái tạo Môi trường</h3>
                                                        <p class="mgB2L">Nhu cầu cho việc thay thế và nâng cao chất lượng các thiết bị và cơ sở luôn thúc giục khách hàng tìm giải pháp,điều này rất có ý nghia. Chúng tôi phát triển và cung cấp giải pháp cho các việc này như là câu trả lời cho những yêu cầu thay đổi môi trường.Chúng tôi cũng có thể giúp các bạn bão dưỡng duy tu tuổi thọ của tòa nhà dự án kể cả trong trường hợp xảy ra thảm họa. </p>
                                                    </section>

                                                    <section>
                                                        <h3 class="h3">Tái tạo Tiết kiệm Năng Lượng.</h3>
                                                        <p class="mgB4L">Các thiết bị trong cơ sở có tuổi thọ ngắn làm tăng giá thành vận hành. Để xử dụng các thiết bị cơ sở sẵn có một cách hiệu quả , chúng tôi phát triển và thực hiện các chức năng về tiết kiệm năng lượng.</p>
                                                    </section>

                                                </section>

                                                <section>
                                                    <h2 class="h2">Bên lề của việc Tái tạo</h2>

                                                    <section>
                                                        <h3 class="h3">Tái tạo cơ sở / Thiết bị</h3>
                                                        <ul class="areaListHalf clearfix">
                                                            <li class="mgB2L">
                                                                <h4 class="h4">Thiết bị DHKK</h4>
                                                                <ul class="list">
                                                                    <li>DHKK/ Quạt/ Bơm</li>
                                                                    <li>Trọn gói DHKK</li>
                                                                    <li>Nguồn nhiệt ( cấp đông/ lò hơi)</li>
                                                                    <li>ống/ống gió</li>
                                                                    <li>Hệ thống tự động điều khiển/ trung tâm theo dõi</li>
                                                                </ul>
                                                            </li>
                                                            <li class="mgB2L">
                                                                <h4 class="h4">Cấp nước/ Thoát nước/ Cơ sở Lọc Nước</h4>
                                                                <ul class="list">
                                                                    <li>Cấp nước/ Nước nóng/ Thiết bị thoát xả .</li>
                                                                    <li>Bể nước / Bồn nước</li>
                                                                    <li>Thiết bị lọc cho hồ bơi và bể tắm.</li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </section>

                                                    <section>
                                                        <h3 class="h3">Hiệu quả tái tạo</h3>
                                                        <div id="bgRenewalKouka01" class="mgBM">
                                                            <h4 class="h4">Nâng cấp chức năng</h4>
                                                            <ul class="list">
                                                                <li>Linh động xử lý cho các phòng và cho thuê riêng biệt.</li>
                                                                <li>Tối ưu hóa DHKK</li>
                                                            </ul>
                                                        </div>
                                                        <div class="tCenter mgBM">
                                                            <figure><img src="/images/f_renewal_kouka.jpg" alt="Renewal" class="img-fluid img_center"></figure>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div id="bgRenewalKouka02">
                                                                    <h4 class="h4">Tiết kiệm năng lượng</h4>
                                                                    <ul class="list">
                                                                        <li>Giới thiệu các thiết bị tiết kiệm năng lượng cao.</li>
                                                                        <li>Giới thiệu các hệ thống trung tâm kiểm soát</li>
                                                                        <li>Giới thiệu các thiết bi bảo trì giá thành thấp</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div id="bgRenewalKouka03">
                                                                    <h4 class="h4">Bảo tồn môi trường</h4>
                                                                    <ul class="list">
                                                                        <li>Giảm hiệu ứng khí thải Carbonic</li>
                                                                        <li>Tuân thủ các Hoạt động thúc đẩy môi trường xanh</li>
                                                                        <li>Xử dụng các loại gas không làm suy giảm tầng khí quyển.</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </section>

                                                </section>

                                                <section>
                                                    <h2 class="h2">Dề nghị Tái tạo</h2>
                                                    <p class="mgBM">Trong thời gian gần đây  sự xuống cấp  của tòa nhà dự án đã trở thành vấn đề nghiêm trọng của xã hội. Nếu trang thiết bị của cơ sở bị xuống cấp .Thì điều này làm cho  tuổi thọ cúa tòa nhà hoặc dự án ngắn đi.   </p>
                                                    <p class="mgBM">Chúng tôi có một đội ngũ chuyên nghiệp để đánh giá các cơ sở và nâng cao hiệu suất bảo trì. Bộ phận kế hoạch tái tạo của chúng tôi sẽ trình bày những phương án tốt nhất được hoan nghênh nhất tuân theo các yêu cầu đề nghị của khách hàng.</p>
                                                    <p class="mgBM">Cơ sở tái tạo sẽ được tiến hành toàn diện,, sự phát triển của môi trường làm việc phụ thuộc vào việc nâng cấp của cơ sở.Tái tạo môi trường làm việc thân thiện sẽ phát triển hình ãnh công ty bạn.Mọi người sẽ đánh giá cao việc thực hiện này.Tái tạo bảo trì cơ sở làm tăng các chức năng , phát triển môi trường làm việc sẽ mang lại hiệu quả trong việc bảo tồn nguồn tái nguyên giới hạn của Trái đất chúng ta.</p>
                                                    <p class="mgB2L">Chúng tôi cung cấp những giải pháp tốt nhất mà khách hàng cần đến và các giá trị tốt nhất cho mỗi góc nhìn quan điểm.</p>

                                                </section>
                                                <!-- InstanceEndEditable --></div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach

                    </div>
                </div>
            </div></div>
    </section>

@endsection
@section('after_script')

@endsection
