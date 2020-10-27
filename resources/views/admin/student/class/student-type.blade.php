<option value="">--Select Course--</option>
@foreach ( $types as  $type)
<option value="{{ $type->id }}">{{ $type->student_type}}</option>
    @endforeach