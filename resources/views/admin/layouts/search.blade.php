@foreach ( $evidance as $record) 

<tr onclick="window.location='{{Route('viewClientUploads', ['id' => $record->id,'file' => $record->id])}}';" style="cursor: pointer">
    <td class="text-center">Q {{$record->number}}</td>
    <td class="text-center">{{$record->topic}}</td>
    <td class="text-center"><span class="tag tag-success">{{$record->status}}</span></td>
    <td >{{$record->question}}</td>
</tr>
@endforeach
<tr class="text-center">
    <td colspan="12" align="center">
        {!! $evidance->render('user.layouts.paginator') !!}
    </td>
</tr>
