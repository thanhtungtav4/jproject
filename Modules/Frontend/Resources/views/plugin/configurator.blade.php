<section class="vm-ware">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pb-5 d-flex">
                <article class="art art-2 bg-box-txt p-5">
                    <h4 class="title-4">@lang('Tùy chỉnh cấu hình')</h4>
                    <hr>
                    <p class="text-muted">
                        @lang('Khi bạn có nhiều quyền kiểm soát hơn trên đám mây của mình, bạn chỉ nên trả tiền cho những gì bạn thực sự cần. Các khoản phí của chúng tôi được giới hạn như gói điện thoại di động nhưng cho phép bạn thay đổi bất cứ lúc nào. Cam kết hợp đồng dài hơn và được giảm giá lớn hơn.')
                    </p>
                </article>
            </div>
            <div class="col-lg-6">
                <div class="choose">
                    <div class="configurator">
                        <ul>
                            <li>
                                <div class="option">RAM (GB)</div>
                                <div class="value" id="ram">
                                    <div id="ram-handle" class="custom-handle ui-slider-handle"></div>
                                </div>
                            </li>
                            <li>
                                <div class="option">CPU (GHZ)</div>
                                <div class="value" id="cpu">
                                    <div id="cpu-handle" class="custom-handle ui-slider-handle"></div>
                                </div>
                            </li>
                            <li>
                                <div class="option">Archive Storage (GB)</div>
                                <div class="value" id="storage">
                                    <div id="storage-handle" class="custom-handle ui-slider-handle"></div>
                                </div>
                            </li>
                            <li>
                                <div class="option">Std Storage (GB)</div>
                                <div class="value" id="std-storage">
                                    <div id="std-storage-handle" class="custom-handle ui-slider-handle"></div>
                                </div>
                            </li>
                            <li>
                                <div class="option">Windows Licenses</div>
                                <div class="value" id="licenses">
                                    <div id="licenses-handle" class="custom-handle ui-slider-handle"></div>
                                </div>
                            </li>
                            <li>
                                <div class="option">Contract Term</div>
                                <div class="value" id="contract">
                                    <div id="contract-handle" class="custom-handle ui-slider-handle"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="sub-total">
                        <div class="title">@lang('Hàng tháng')</div>
                        <div class="total">VND<span>45.000.000</span></div>
                    </div>
                    <p>
                        @lang('Chỉ các dịch vụ PAYG (không có hợp đồng) có thể được mua trực tuyến. Đối với hợp đồng 12 tháng (hoặc lớn hơn) xin vui lòng liên hệ với nhóm bán hàng của chúng tôi.')
                    </p>
                </div>
            </div>
        </div>
        <div class="text-center p-5">
            <button class="btn btn-primary" onclick="Shared.redirectTo('{{ route(getValueByLang('frontend.about.contact_')) }}')">
                @lang('Xem bảng giá')
            </button>
        </div>
    </div>
</section>
