<h4 class="font-weight-bold">Basic Information</h4>
<div class="table-responsive">
    <table class="table table-bordered">
         <tr>
             <th>Student Name</th>
         <td>{{ $students[0]->student_name}}</td>
         </tr>
         
         <tr>
             <th>Father's Name</th>
         <td>{{ $students[0]->father_name}}</td>
         </tr>
         <tr>
             <th>Father's Profession</th>
         <td>{{ $students[0]->father_profession}}</td>
         </tr>
         <tr>
             <th>Father's Mobile</th>
         <td>{{ $students[0]->student_name}}</td>
         </tr>
         <tr>
         <tr>
             <th>Mother's Name</th>
         <td>{{ $students[0]->mother_name}}</td>
         </tr>
         <tr>
             <th>Mother's Profession</th>
         <td>{{ $students[0]->mother_profession}}</td>
         </tr>
         <tr>
             <th>Mother's Mobile</th>
         <td>{{ $students[0]->mother_name}}</td>
         </tr>
         <tr>
             <th>School</th>
         <td>{{ $students[0]->school_name}}</td>
         </tr>
         <tr>
             <th>Class</th>
         <td>{{ $students[0]->class_name}}</td>
         </tr>
         <tr>
             <th>SMS Mobile</th>
         <td>{{ $students[0]->sms_mobile}}</td>
         </tr>
         <tr>
             <th>Email Address</th>
         <td>{{ $students[0]->email_address}}</td>
         </tr>
         <tr>
             <th>Student ID</th>
         <td>{{ $students[0]->user_id}}</td>
         </tr>
         <tr>
             <th>Password</th>
         <td>{{ $students[0]->password}}</td>
         </tr>

         <tr>
             <th style="vertical-align: middle">Courses</th>
         <td>
            @foreach ($students as $student)
                Course: {{$student->student_type}},
                Batch: {{$student->batch_name}},
                Roll: {{$student->roll_no}}
            @endforeach
         </td>
         </tr>
        
         <tr>
            <th>Address</th>
        <td>{{ $students[0]->address}}</td>
        </tr>

    </table>
</div>