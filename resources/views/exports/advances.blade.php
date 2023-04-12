<table class="table ">
    <thead>
    <tr>
        <th>ФИО</th>
        <th>ИИН</th>
        <th>Компания</th>
        <th>Сумма</th>
        <th>Дата</th>
        <th>Статус </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $i)
        <tr>
            <td>{{ $i->user->full_name  }}</td>
            <td>{{ $i->user->iin }}</td>
            <td>{{ $i->company && $i->company->name ?  $i->company->name : ''  }}</td>
            <td>{{ $i->amount }}</td>
            <td>{{ $i->created_date  }}</td>
            <td>{{ isset($ar_status[$i->status]) ?? '' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
