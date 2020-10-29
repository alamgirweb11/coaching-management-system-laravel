<div class="table-responsive p-1">
    <table id="" class="table table-striped table-bordered dt-responsive text-center" style="width: 100%;">
        <thead>
        <tr>
            <th>Sl.</th>
            <th>Name</th>
            <th>Roll</th>
            <th>School</th>
            <th>SMS Number</th>
            <th>Student ID</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @php($i=1)
           @foreach ($attendances as $attendance)
              <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $attendance->student_name }}</td>
                    <td>{{ $attendance->roll_no}}</td>
                    <td>{{ $attendance->school_name}}</td>
                    <td>{{ $attendance->sms_mobile}}</td>
                    <td>{{ $attendance->student_id}}</td>
                    <td>
                       Present <input type="radio" name="attendance[{{ $attendance->id }}]"{{ $attendance->attendance == 1 ? 'checked' : ''}} value="1">&nbsp;
                       Absent <input type="radio" name="attendance[{{ $attendance->id }}]"{{ $attendance->attendance == 2 ? 'checked' : ''}} value="2">
                    </td>
              </tr>
           @endforeach
           @if (count($attendances)>0)
                     <tr>
                         <td colspan="7">
                              <button class="btn btn-block my-btn-submit" type="submit">Update Attendance</button>
                            </td>
                    </tr>
           @endif
        </tbody>
    </table>
</div>