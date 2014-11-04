@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="csnews">
                <div class="csnews-item">
                    <div class="csnews-title">New Website Design</div>
                    <div class="csnews-date">
                        <div class="csnews-month">aug</div>
                        <div class="csnews-day">26</div>
                    </div>
                    <div class="csnews-content">
                        Aliquam convallis vestibulum luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut dignissim justo nisl, id faucibus nisl dignissim id. Donec nec interdum lectus, quis posuere nisi. Duis vehicula facilisis risus, eu viverra nibh lobortis at. Fusce sodales venenatis lacus, quis faucibus libero ullamcorper sed. Proin in auctor nibh, ut maximus purus. Praesent et ornare eros. Duis convallis lacus est, eget suscipit urna vestibulum in. Nullam non enim ac diam commodo lobortis.
                    </div>
                </div>
                <div class="csnews-item">
                    <div class="csnews-title">New Website Design</div>
                    <div class="csnews-date">
                        <div class="csnews-month">aug</div>
                        <div class="csnews-day">26</div>
                    </div>
                    <div class="csnews-content">
                        Aliquam convallis vestibulum luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut dignissim justo nisl, id faucibus nisl dignissim id. Donec nec interdum lectus, quis posuere nisi. Duis vehicula facilisis risus, eu viverra nibh lobortis at. Fusce sodales venenatis lacus, quis faucibus libero ullamcorper sed. Proin in auctor nibh, ut maximus purus. Praesent et ornare eros. Duis convallis lacus est, eget suscipit urna vestibulum in. Nullam non enim ac diam commodo lobortis.
                    </div>
                </div>
                <div class="csnews-item">
                    <div class="csnews-title">New Website Design</div>
                    <div class="csnews-date">
                        <div class="csnews-month">aug</div>
                        <div class="csnews-day">26</div>
                    </div>
                    <div class="csnews-content">
                        Aliquam convallis vestibulum luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut dignissim justo nisl, id faucibus nisl dignissim id. Donec nec interdum lectus, quis posuere nisi. Duis vehicula facilisis risus, eu viverra nibh lobortis at. Fusce sodales venenatis lacus, quis faucibus libero ullamcorper sed. Proin in auctor nibh, ut maximus purus. Praesent et ornare eros. Duis convallis lacus est, eget suscipit urna vestibulum in. Nullam non enim ac diam commodo lobortis.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="csnade">
                <h4>Recent Nades</h4>
                <ul class="csnade-list">
                    @foreach($nades as $nade)
                    <li>
                        <a href="#">
                            <i class="{{ Nade::getNadeIcon($nade->type) }}" title="{{ Nade::getNadeTypeLabel($nade->type) }}"></i>
                            {{ $nade->title }}
                            <span>{{ $nade->map->name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@stop
