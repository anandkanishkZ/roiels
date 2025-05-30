<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-pverview-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-info"></i> &nbsp;Overview</a>
     <!--    <a class="nav-item nav-link" id="nav-wholesale-tab" data-toggle="tab" href="#nav-wholesale" role="tab" aria-controls="nav-wholesale" aria-selected="false"> <i class="fa fa-shopping-cart"></i> Wholesale</a> -->
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-size" role="tab" aria-controls="nav-size" aria-selected="false"> <i class="fa fa-square"></i> Size</a>
        <a class="nav-item nav-link" id="nav-color-tab" data-toggle="tab" href="#nav-color" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-circle"></i> Color </a>
        <a class="nav-item nav-link" id="nav-specification-tab" data-toggle="tab" href="#nav-specification" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-info"></i> Specification </a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-image-gallery" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-image"></i> Gallery </a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-meta" role="tab" aria-controls="nav-contact" aria-selected="false"> <i class="fa fa-search"></i> Meta</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent" style="margin-top: 20px;">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        @include($view_path . '.overview')
    </div>
{{--     <div class="tab-pane fade" id="nav-wholesale" role="tabpanel" aria-labelledby="nav-wholesale-tab">
        @include($view_path . '.wholesale')
    </div> --}}
    <div class="tab-pane fade" id="nav-size" role="tabpanel" aria-labelledby="nav-profile-tab">
        @include($view_path . '.size')
    </div>
    <div class="tab-pane fade" id="nav-color" role="tabpanel" aria-labelledby="nav-color-tab">
        @include($view_path . '.color')
    </div>
    <div class="tab-pane fade" id="nav-specification" role="tabpanel" aria-labelledby="nav-specification-tab">
        @include($view_path . '.specification')
    </div>
    <div class="tab-pane fade" id="nav-image-gallery" role="tabpanel" aria-labelledby="nav-contact-tab">
        @include($view_path . '.gallery')
    </div>
    <div class="tab-pane fade" id="nav-meta" role="tabpanel" aria-labelledby="nav-contact-tab">
        @include($view_path . '.meta')
    </div>
    <div class="tab-pane fade" id="nav-video" role="tabpanel" aria-labelledby="nav-contact-tab">
        @include($view_path . '.video')
    </div>
</div>
