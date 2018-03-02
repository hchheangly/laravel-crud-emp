<fieldset style="width: 50%;margin: 0 auto;">
    <legend>Update New Employee</legend>

    <form action="{{ route('update', $employee->id) }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>
                    Firstname
                </td>
                <td>
                    <input type="text" value='{{ $employee->firstname }}' name="firstname" placeholder="firstname"/>
                </td>
            </tr>
            <tr>
                <td>
                    Lastname
                </td>
                <td>
                    <input type="text" value='{{ $employee->lastname }}' name="lastname" placeholder="lastname"/>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="text" value='{{ $employee->email }}' name="email" placeholder="email"/>
                </td>
            </tr>
            <tr>
                <td>
                    Phone
                </td>
                <td>
                    <input type="text" value='{{ $employee->phone }}' name="phone" placeholder="phone"/>
                </td>
            </tr>
            <tr>
                <td>
                    Age
                </td>
                <td>
                    <input type="text" value='{{ $employee->age }}' name="age" placeholder="age"/>
                </td>
            </tr>
            <tr>
                <td>
                    Position
                </td>
                <td>
                    <select name="position_id" id="">
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