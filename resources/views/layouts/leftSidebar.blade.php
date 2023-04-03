<div class="" style="background-color: #e6a053 ;border-radius:5px;margin:15px 0px 15px 0px;">
<li class="nav-item dropdown sideli">
                           <a id="navbarDropdown" class="nav-link" href="{{route('panel')}}" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                            Panel
                           </a>

   </li>
   <li class="nav-item dropdown sideli">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             Artist
                           </a>

                           <div class="dropdown-menu dropdown-menu-end ddli" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="{{route('listArtist')}}" >
                                   {{ __('List') }}
                               </a>

                           </div>
   </li>
                       
   <li class="nav-item dropdown sideli">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             Event
                           </a>

                           <div class="dropdown-menu dropdown-menu-end ddli" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item"  href="{{ route('listEvent') }}">
                                   {{ __('List') }}
                               </a>

                           </div>
   </li>

   <li class="nav-item dropdown sideli">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             Genres
                           </a>

                           <div class="dropdown-menu dropdown-menu-end ddli" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="{{route('listGenre')}}">
                                   {{ __('List') }}
                               </a>

                           </div>
   </li>

   <li class="nav-item dropdown sideli" style="border:none">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             Venue
                           </a>

                           <div class="dropdown-menu dropdown-menu-end ddli" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="{{ route('listVenue') }}">
                                   {{ __('List') }}
                               </a>

                           </div>
   </li>
                      

</div>