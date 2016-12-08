{{ Theme::asset()->usePath()->add('scripts-js','js/scripts.js') }}
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<a href="back">Back</a>
<form id="frminsertjson">
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
            <td>Email:</td>
            <td><input type="email" name="email"> </td>
        </tr>
        <tr>
            <td>Age:</td>
            <td><input type="text" name="age"> </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><input type="text" name="gender"> </td>
        </tr>
        <tr>
            <td>Location:</td>
            <td><input type="text" name="location"> </td>
        </tr>
        <tr>
            <td><input type="button" value="Submit" id="submitjson"></td>
        </tr>
    </table>
</form>