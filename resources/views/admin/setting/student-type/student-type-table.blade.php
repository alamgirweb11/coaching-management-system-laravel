@if(count($studentTypes)>0)
@php($i=1)
@foreach ($studentTypes as $studentType)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{ $studentType->class_name }}</td>
    <td>{{ $studentType->student_type }}</td>
    <td>{{ $studentType->status == 1 ? 'Active' : 'Inactive'}}</td>
    <td>
         @if($studentType->status == 1)
        <button onclick="studentTypeUnpublish('{{ $studentType->id }}')" class="btn btn-sm btn-success fa fa-arrow-alt-circle-up" title="Unpublished"></button>
        @else
        <button onclick="studentTypePublish('{{ $studentType->id }}')" class="btn btn-sm btn-warning fa fa fa-arrow-alt-circle-down" title="Published"></button>
        @endif
        <button onclick="studentTypeEdit('{{ $studentType->id }}','{{ $studentType->student_type }}')" class="btn btn-sm btn-info fa fa-edit" title="Edit"></button>
        <button onclick="studentTypeDelte('{{ $studentType->id }}')" class="btn btn-sm btn-danger fa fa-trash-alt" title="Delete"></button>
    </td>
</tr>
@endforeach
@else 
    <tr class="text-danger">
         <td colspan="5">Student Type Not Found!!!</td>
    </tr>
@endif
