{{ Theme::asset()->usePath()->add('scripts-js','js/scripts.js') }}
{{ Theme::asset()->usePath()->add('style-css','css/style.css') }}
<form method="post" action="login" id="frmlogin">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <table>
        <tr>
            <td>Username:</td>
            <td><input type="email" id="username" name="username"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" id="password" name="password"></td>
        </tr>
        <tr>
           <td><input type="submit" value="Login" id="btnlogin"></td>
            <td><input type="button" value="Register" id="btnregister"> </td>
        </tr>
    </table>

    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</form>