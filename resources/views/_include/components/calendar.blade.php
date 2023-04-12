<div class="calendar-component">
    <ul class="row p-0">
        @for($i = 1; $i < 32; $i++)
            <li class="col-md-2 btn btn-secondary">
                <p>{{$i}}</p>
            </li>
        @endfor
    </ul>
</div>

<style>
    .calendar-component ul .btn{
        margin: 5px;
        list-style: none;
        max-width: max-content;
        min-width: 45px;
    }
    .calendar-component ul li{
        list-style: none;
        cursor: pointer;
    }

    .calendar-component ul .btn p{
        margin: 0;
    }
</style>
