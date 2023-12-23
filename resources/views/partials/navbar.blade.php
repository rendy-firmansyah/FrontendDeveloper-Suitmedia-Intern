<nav class="navbar navbar-expand-lg navbar-light bg-nav fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
        <img src="{{asset('asset/suitmedialogo.png')}}" alt="" style="height: 70px" width="auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('work') ? 'active' : '' }} text-white" href="work">Work</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }} text-white" href="about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('services') ? 'active' : '' }} text-white" href="services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('ideas') ? 'active' : '' }} text-white" href="ideas">Ideas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('careers') ? 'active' : '' }} text-white" href="careers">Careers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('contact') ? 'active' : '' }} text-white" href="contact">Contact</a>
            </li>
        </ul>
        </div>
    </div>
</nav>