@extends('layouts.master')
@section('header_content', 'Tareas')

@section('content')
    <table id="tareas" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descripción</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->status}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
<script>
  $(function () {
    $('#tareas').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection