
<nav class="navbar navbar-expand-lg  nav-bg-color">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img class="nav-logo-img" src="{{ asset('images/logo.jpg') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav navlink-color">
                <a class="nav-link active" aria-current="page" href="{{route('home.index')}}">Home</a>
                <a class="nav-link" href="{{route('abouts.index')}}">About Us</a>
                <a class="nav-link" href="{{ url('/') }}#industry">Industries</a>
                <a class="nav-link" href="{{ url('/') }}#business">Business Unit</a>
                <a class="nav-link" href="{{ url('/') }}#milestones">Achievement</a>
                <a class="nav-link" href="{{route('news.index')}}">News</a>
                <a class="nav-link" href="{{route('employee-engagments.index')}}">Employee Engagement</a>
                <a class="nav-link" href="{{route('careers.index')}}">Career</a>
                <a class="nav-link" href="{{ url('/') }}#connect">Get in Touch</a>
            </div>
        </div>
    </div>
</nav>
