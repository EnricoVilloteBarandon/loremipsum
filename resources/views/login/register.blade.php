<form id="frmregister" method="post" action="insertuser">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table>
        <tr>
            <td>Firstname:</td>
            <td><input type="text" name="firstname"> </td>
        </tr>
        <tr>
            <td>Lastname:</td>
            <td><input type="text" name="lastname"> </td>
        </tr>
        <tr>
            <td>Input Type:</td>
            <td><input type="text" name="type"> </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email"> </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password"> </td>
        </tr>
        <tr>
            <td><input type="submit" id="submitregister" value="Register"> </td>
        </tr>
    </table>
</form>