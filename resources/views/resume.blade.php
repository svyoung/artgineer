<div class="resume-container">
    <h1>> Resume</h1><div class="download-resume"><a href="{{ asset('/files/SVYResume.pdf') }}" target="_blank"><i class="fas fa-file-pdf"></i></a></div>
    <div class="company-menu">
        <ul>
        @foreach ($company_abbrev as $key => $abbrev)
            <li data-comp-menu="{{$key}}" onclick="svyglobal.fn.getCompany('{{$key}}')">{{$abbrev}}</li>
        @endforeach
        </ul>

    </div>
    <div class="company-wrapper">
        @foreach ($companies as $key => $company)
            <div class="company-details" data-company="{{$key}}" style="display:none;">
                <h1 class="ctitle">{{ $company['company_title'] }}</h1> @ <a href="{{$company['company_url']}}" target="_blank"><h1 class="cname">{{ $company['company_name'] }}</h1></a>
                <hr/>
                <div class="cloc"><i class="fas fa-map-marker-alt"></i> {{ $company['company_location'] }}</div> <div class="cdate">{{ $company['company_start'] }} - {{ $company['company_end'] }}</div>
                <div class="details-content">
                    <ul class="description">
                        @foreach ($company['description'] as $description)
                            <li>{{$description}}</li>
                        @endforeach
                    </ul>
                    <ul class="tech-stack">
                        @foreach ($company['tech_stack'] as $tech)
                            <li><code>{{$tech}}</code></li>
                        @endforeach
                    </ul>
                </div>
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
