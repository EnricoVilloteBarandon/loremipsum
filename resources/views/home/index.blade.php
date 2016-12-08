{{ Theme::asset()->usePath()->add('style-css','css/style.css') }}
{{ Theme::asset()->usePath()->add('scripts-js','js/scripts.js') }}
<div class="container-fluid">
    <div class="jumbotron text-center firstdiv">
        <h1>Foobar</h1>
        <div class="unorderedlist">
            <a href="testinsert">Insert</a>
            <a href="#">Test</a>
            <a href="#">Test</a>
            <a href="/logout">Logout</a>
        </div>
    </div>
</div>
<div class="container">
    <table id="tbl">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Location</th>
        </tr>
        @foreach($profile as $key => $value)
            <tr>
            <?php
                $arr = json_decode($value->data);
                foreach($arr as $key => $value){
                    echo '<td>' . $value . '</td>';
                }
            ?>
            </tr>
        @endforeach
    </table>
</div>
<div class="container">
    <hr/>
    <input type="text" id="search" placeholder="Search User">
    <ul id="demo"></ul>
</div>