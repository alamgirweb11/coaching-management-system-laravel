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
           @foreach ($students as $student)
              <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->roll_no}}</td>
                    <td>{{ $student->school_name}}</td>
                    <td>{{ $student->sms_mobile}}</td>
                    <td>{{ $student->id}}</td>
                    <td>
                       Present <input type="radio" name="attendance[{{ $student->id }}]" value="1">&nbsp;
                       Absent <input type="radio" name="attendance[{{ $student->id }}]" value="2" checked>
                    </td>
              </tr>
           @endforeach
           @if (count($students)>0)
                     <tr>
                         <td colspan="7">
                              <button class="btn btn-block my-btn-submit" type="submit">Submit Attendance</button>
                            </td>
                    </tr>
           @endif
        </tbody>
    </table>
</div>