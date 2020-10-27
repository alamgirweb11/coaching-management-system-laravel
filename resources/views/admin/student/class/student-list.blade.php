<div class="table-responsive p-1">
    <table id="classWiseStudentList" class="table table-striped table-bordered dt-responsive text-center" style="width: 100%;">
        <thead>
        <tr>
            <th>Sl.</th>
            <th>Name</th>
            <th>Batch</th>
            <th>Roll</th>
            <th>School</th>
            <th>Father's Name</th>
            <th>Father's Mobile</th>
            <th>Mother's Name</th>
            <th>Mother's Mobile</th>
            <th>Sms Mobile</th>
            <th>Student ID</th>
            <th style="width: 100px;">Action</th>
        </tr>
        </thead>
        <tbody>
            @php($i=1)
           @foreach ($students as $student)
              <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->batch_name}}</td>
                    <td>{{ $student->roll_no}}</td>
                    <td>{{ $student->school_name}}</td>
                    <td>{{ $student->father_name}}</td>
                    <td>{{ $student->father_mobile}}</td>
                    <td>{{ $student->mother_name}}</td>
                    <td>{{ $student->mother_mobile}}</td>
                    <td>{{ $student->sms_mobile}}</td>
                    <td>{{ $student->id}}</td>
                    <td>
                          <a href="" class="btn btn-info btn-sm fa fa-edit"></a>
                          <a href="" onclick="return confirm('If you want to delete this item Press OK')" class="btn btn-danger btn-sm fa fa-trash-alt"></a>
                    </td>
              </tr>
           @endforeach
        </tbody>
    </table>
</div>
<script>
    // search specific data
    $(document).ready(function() {
    $('#classWiseStudentList').DataTable({
        fixedHeader:true
    });
} );
</script>