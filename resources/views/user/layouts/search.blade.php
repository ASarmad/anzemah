@foreach ( $evidance as $record) 
<tr>
    <td class="text-center">Q {{$record->number}}</td>
    <td class="text-center">{{$record->topic}}</td>
    <td class="text-center">
    <a href="{{Route('single_evidance_read', ['id' => $record->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i></a>
    </td>
    <td class="text-center"><span class="tag tag-success">{{$record->status}}</span></td>
    <td >{{$record->question}}</td>
</tr>
@endforeach
<tr class="text-center">
    <td colspan="12">
        {!! $evidance->render('utlities.paginator') !!}
    </td>
</tr>