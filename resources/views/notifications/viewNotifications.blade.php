
<a href="" class="dropdown-toggle" data-toggle="dropdown" id="dropDownNotify">
    <i class="fa fa-bell-o"></i>
    @if( $count && $count > 0)
        <span class="label label-warning" id="lblNotify">{{$count}}</span>
    @endif
</a>
@if($count && $count > 0)
    <ul class="dropdown-menu">
        <li class="header">You have {{$count}} notifications</li>
        <li>
            <!-- Inner Menu: contains the notifications -->
            <ul class="menu">
                @if($poolNewReservation>0)
                    <li><!-- start notification -->
                        <a href="{{URL::to('adminPoolRes')}}" id="viewNewRes"
                           class="viewNewRes">
                            <i class="fa fa-users text-aqua"></i>{{$poolNewReservation}} new
                            Swimming pool reservations are placed.
                        </a>
                    </li>
                @endif
                @if($diningNewResCount>0)
                    <li><!-- start notification -->
                        <a href="{{URL::to('viewDinningReservations')}}" id="viewNewRes"
                           class="viewNewRes">
                            <i class="fa fa-users text-aqua"></i>{{$diningNewResCount}} new
                            dinning reservations are placed.
                        </a>
                    </li>
                @endif
                @if($newMeetingResCount>0)
                    <li><!-- start notification -->
                        <a href="{{URL::to('meetingResAdminPg')}}" id="viewNewRes"
                           class="viewNewRes">
                            <i class="fa fa-users text-aqua"></i>{{$newMeetingResCount}} new
                            meetings reservations are placed.
                        </a>
                    </li>
                    @endif
                  <!-- end notification -->
            </ul>
        </li>
        <li class="footer"><a href="#">View all</a></li>
    </ul>
@endif