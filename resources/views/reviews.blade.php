@extends('layouts.main')
@section('content')
<div class="mkdf-content" style="margin-top: -102px">
    <div class="mkdf-content-inner">
       
       <div class="mkdf-full-width">
          <div class="mkdf-full-width-inner">
             <div class="mkdf-grid-row">
                <div class="mkdf-page-content-holder mkdf-grid-col-12">
                   <div class="mkdf-row-grid-section-wrapper mkdf-content-aligment-center">
                      <div class="mkdf-row-grid-section">
                         <div class="vc_row wpb_row vc_row-fluid vc_custom_1554196011542">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                               <div class="vc_column-inner">
                                  <div class="wpb_wrapper">
                                     <div class="mkdf-section-title-holder  ">
                                        <div class="mkdf-st-inner">
                                           <h6 class="mkdf-st-subtitle" style="margin: 7px">
                                            Here is what our clients had to say about our work.
                                           </h6>
                                           <h2 class="mkdf-st-title">
                                            Reviews
                                           </h2>
                                           <div class="mkdf-st-line"></div>
                                        </div>
                                     </div>
                                     <div class="vc_empty_space" style="height: 108px"><span class="vc_empty_space_inner"></span></div>
                                     <div class="mkdf-testimonials-holder clearfix mkdf-testimonials-standard   ">
                                        <div class="mkdf-testimonials mkdf-owl-slider" data-number-of-items="2" data-enable-loop="yes" data-enable-autoplay="no" data-slider-speed="5000" data-slider-speed-animation="600" data-enable-navigation="yes" data-enable-pagination="yes" data-number-of-items-1281-1366="2" data-number-of-items-1025-1280="2" data-number-of-items-769-1024="1" data-number-of-items-681-768="1" data-number-of-items-680="1">
                                            @foreach ($reviews as $review)
                                            <div class="mkdf-testimonial-content" style="margin: 5px">
                                              <div class="mkdf-testimonial-text-holder">
                                                 <div class="mkdf-testemonials-slash"></div>
                                                 <div class="mkdf-testemonials-informations">
                                                    <p class="mkdf-testimonial-text">{{$review->review}}</p>
                                                    <span class="mkdf-testimonial-author">
                                                    <span class="mkdf-testimonials-info-author-text">By</span>
                                                    <span class="mkdf-testimonials-author-name">{{$review->name}}</span>
                                                    </span>
                                                 </div>
                                              </div>
                                           </div>
                                           @endforeach

                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection