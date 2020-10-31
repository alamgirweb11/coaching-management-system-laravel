<table class="table table-bordered text-center">
  <thead>
      <tr>
           <th>Sl.</th>
           <th>Exam Name</th>
           <th>Result Type</th>
           <th>Status</th>
           <th>Action</th>
      </tr>
  </thead>
   <tbody>
         @php($i=1)
         @foreach ($exams as $exam)
         <tr>
             <td>{{ $i++ }}</td>
             <td>{{ $exam->exam_name }}</td>
             <td class="text-capitalize">{{ $exam->result_type }}</td>     
             <td>
                @if($exam->status==1)
                  <span class="badge badge-success">{{ 'Active' }}</span> 
                  @else 
                  <span class="badge badge-danger">{{ 'Inactive' }}</span> 
                  @endif 
            </td>
             <td style="font-size: large">
                @if($exam->status==1)
                 <button class="btn btn-success btn-sm" title="Deactivate"
                 onclick="examDeactivate('{{ $exam->class_id }}','{{ $exam->type_id }}','{{ $exam->id }}')">
                    <i class="fa fa-arrow-up"></i></button>
                 @else
                 <button class="btn btn-warning btn-sm"  title="Activate"
                 onclick="examActivate('{{ $exam->class_id }}','{{ $exam->type_id }}','{{ $exam->id }}')">
                 <i class="fa fa-arrow-down"></i></button>
                @endif
                 <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                 <button class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
            </td>
        </tr>
        @endforeach
        @if(count($exams) == 0)
        <tr class="text-danger text-center">
             <th colspan="5">Exam not found !!!</th>
        </tr>
        @endif
   </tbody>
</table>