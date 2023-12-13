@foreach ( $evidance as $record) 

<tr onclick="window.location='{{Route('viewClientUploads', ['id' => $client->id,'file' => $record->id])}}';" style="cursor: pointer">
    <td class="text-center">Q {{$record->number}}</td>
    <td class="text-center">{{$record->topic}}</td>
    <td class="text-center"><span class="tag tag-success">{{$record->status}}</span></td>
    <td >{{$record->question}}</td>
</tr>
@endforeach
<tr class="text-center">
    <td colspan="12">
        {!! $evidance->render('utlities.paginator') !!}
    </td>
</tr>
