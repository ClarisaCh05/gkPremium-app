@section('user')
  @guest
    @if (Route::has('login'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}" @click.prevent="showLogin">{{ __('Login') }}</a>
      </li>
    @endif

    @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}" @click.prevent="showRegister">{{ __('Register') }}</a>
        </li>
    @endif
    @else
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
      </li>
  @endguest
    <a href="/html/front/chat_user.html">
      <i class="far fa-comment-dots"></i>
    </a>
