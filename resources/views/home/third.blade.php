<form id="frm" method="post" action="submitform" enctype="multipart/form-data">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <table>
        <tr>
            <td>Title :</td>
            <td><input type="text" name="title"><br/></td>
        </tr>
        <tr>
            <td>Image :</td>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <td><input type="submit" value="submit"></td>
        </tr>
    </table>
</form>
<table>
    @foreach($image as $key=>$value)
        <tr>
            <td>{{ $value->title }}</td>
            <td><img src="{{ URL::to('img/'.$value->image) }}" style="width: 100px;height: 100px;"></td>
            <td><a href="#" data-id="{{ $value->id }}">EDIT</a></td>
        </tr>
    @endforeach
</table>