<fieldset style="width: 50%;margin: 0 auto;">
    <legend>Add New Employee</legend>
    <form action="{{ url('/store') }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>
                    Firstname
                </td>
                <td>
                    <input type="text" name="firstname" placeholder="firstname"/>
                </td>
            </tr>
            <tr>
                <td>
                    Lastname
                </td>
                <td>
                    <input type="text" name="lastname" placeholder="lastname"/>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="text" name="email" placeholder="email"/>
                </td>
            </tr>
            <tr>
                <td>
                    Phone
                </td>
                <td>
                    <input type="text" name="phone" placeholder="phone"/>
                </td>
            </tr>
            <tr>
                <td>
                    Age
                </td>
                <td>
                    <input type="text" name="age" placeholder="age"/>
                </td>
            </tr>
            <tr>
                <td>
                    Position
                </td>
                <td>
                    <select name="position_id" id="">
                        <option value="0">-- select position --</option>
                        @foreach($pos as $p)
                            <option value="{{ $p->position_id }}">{{ $p->position_name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit"/></td>
            </tr>
        </table>
    </form>
</fieldset>