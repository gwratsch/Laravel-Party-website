<div class="links col-10">
   <ul class="navbar-nav ml-auto"> 
    
   <li >
       <a  class="nav-link dropdown-item" href="/" >Home</a>
   </li>
    @guest
    @else
        
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Party <span class="caret"></span>
                </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/party">Party</a>
                    <a class="dropdown-item" href="/party/create">create</a>
              </div>
        </li> 
  
    @endguest
   </ul>
</div>