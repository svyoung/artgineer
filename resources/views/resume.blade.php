<div class="resume-container">
    <div class="company-menu">
        <h1>Experiences</h1>
        <ul>
        @foreach ($company_abbrev as $key => $abbrev)
            <li data-comp-menu="{{$key}}" onclick="svyglobal.fn.getCompany('{{$key}}')">{{$abbrev}}</li>
        @endforeach
        </ul>

    </div>
    <div class="company-wrapper">
        @foreach ($companies as $key => $company)
            <div class="company-details" data-company="{{$key}}" style="display:none;">
                <h1 class="ctitle">{{ $company['company_title'] }}</h1> @ <h1 class="cname">{{ $company['company_name'] }}</h1>
                <hr/>
                <div class="cloc-cdate"><i class="fas fa-map-marker-alt"></i> {{ $company['company_location'] }} | {{ $company['company_start'] }} - {{ $company['company_end'] }}</div>
                <ul>
                @foreach ($company['description'] as $description)
                    <li>{{$description}}</li>
                @endforeach
                </ul>

            </div>
        @endforeach
    </div>
</div>
{{--<p>Company: {{ $company['company_name'] }}</p>--}}
{{--<p>Location: {{ $company['company_location'] }}</p>--}}
{{--<p>Title: {{ $company['company_title'] }}</p>--}}
{{--<p>Start: {{ $company['company_start'] }}</p>--}}
{{--<p>End: {{ $company['company_end'] }}</p>--}}
{{--@foreach ($company['description'] as $description)--}}
    {{--<p>des: {{$description}}</p>--}}
{{--@endforeach--}}
