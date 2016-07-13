<table class="table table-striped table-condensed">
    <thead>
    <th>Filename</th>
    <th>Filesize</th>
    <th>Filetype</th>
    <th></th>
    </thead>
    <tbody>
    @forelse ($medias as $media)
        <tr>
            <td>{{$media->filename}}</td>
            <td>{{$media->filesize}} Byte(s)</td>
            <td>{{$media->filetype}}</td>
            <td>
                <a href="{{route('media.show', ['id' => $media->id])}}">Show</a>
                <a href="{{$media->getDownloadlink()}}">Download</a>
                <a href="{{route('media.delete', ['id' => $media->id])}}">Delete</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">
                No Files available
            </td>
        </tr>
    @endforelse
    </tbody>
</table>