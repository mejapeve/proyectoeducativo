<nav id="navbar" class="pb-0 navbar-glass sticky-top-ie row navbar-top sticky-kit navbar navbar-expand-lg navbar-light" ng-controller="navbarController">
  <button aria-label="Toggle navigation" id="toggleMenu" type="button" class="navbar-toggler">
  <span class="navbar-toggler-icon"></span>
  </button>
  <a class="text-decoration-none navbar-brand text-left ml-3" id="topLogo" href="#">
     <div class="d-flex align-items-center">
        <img class="mr-2 avatar-logo" src="{{ asset('images/icons/iconosoloConexiones-01.png') }}" alt="Logo" width="40">
        <div class="text-sans-serif text-center fs-sm--3 fs-md--2 fs-lg-0 font-weight-semi-bold">
           <span id="slogan" >Experiencias científicas <br/> para conocer el mundo <br/> natural</span>
        </div>
     </div>
  </a>
  @auth('afiliadoempresa')
  @if(auth('afiliadoempresa')->user()->hasAnyRole('student'))
     <ul class="nav collapse navbar-collapse row text-align-rigth row">
        <li class="nav-item ml-lg-14 col-2-2 d-flex ml-xl-10 ml-lg-8">
           <a href="{{ route('student', auth('afiliadoempresa')->user()->company_name()) }}" 
              class="nav-link  mr-2 p-0 pb-1
              @if(\Route::current()->getName() == 'avatar') selected @endif
              @if(\Route::current()->getName() == 'student') selected @endif">
              Mi perfíl
           </a>
              <i class="fas fa-user fs-1"></i>
        </li>
        <li class="nav-item ml-lg-14 col-auto d-flex">
           <a href="{{ route('student.available_sequences',auth('afiliadoempresa')->user()->company_name()) }}" class="nav-link  mr-2 p-0 pb-1 
           @if(Route::current()->getName() == 'student.available_sequences' ||  
               Route::current()->getName() == 'student.sequences_section_1'  ) 
               selected @endif">Mis cursos</a>
           <i class="fas fa-book-open fs-1"></i>
        </li>
        <li class="nav-item ml-lg-14 col-auto d-flex">
           <a href="{{ route('student.achievements',auth('afiliadoempresa')->user()->company_name()) }}" class="nav-link  mr-2 p-0 pb-1 @if(\Route::current()->getName() == 'student.achievements') selected @endif">
           Logros
           </a>
           <i class="fas fa-star fs-1"></i></li>
        <li class="nav-item ml-lg-14 col-auto d-flex"><a href="{{ route('home') }}" class="nav-link  mr-2 p-0 pb-1 @if(\Route::current()->getName() == 'home') selected @endif">Calendario</a><i class="fas fa-calendar-alt fs-1"></i></li>
        <li class="nav-item ml-lg-14 col-2 d-flex"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link  mr-2 p-0 pb-1" >Salir</a><i class="fas fa-door-open fs-1"></i></li>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
           @csrf
        </form>
     </ul>
  @endif
  @endauth
</nav>
